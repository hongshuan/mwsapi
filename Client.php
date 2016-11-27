<?php

namespace Amazon\Mws;

class Client
{
    protected $config;
    protected $logger;
    protected $method; // GET|POST

    public function __construct($config)
    {
        $this->logger = null;
        $this->config = $config;

        $required = [ 'AccessKey', 'SellerId', 'MarketplaceId', 'SecretKey', 'ServiceUrl' ];

        foreach ($required as $key) {
            if (!isset($config[$key])) {
                throw new \Exception("[$key] is required");
            }
        }
    }

    public function httpGet($path, $params, $options = [])
    {
        $this->method = 'GET';
        return $this->sendRequest($path, $params, $options);
    }

    public function httpPost($path, $params, $options = [])
    {
        $this->method = 'POST';
        return $this->sendRequest($path, $params, $options);
    }

    protected function sendRequest($path, $params, $options = [])
    {
        $params['AWSAccessKeyId']   = $this->config['AccessKey'];
        $params['SellerId']         = $this->config['SellerId'];
        $params['MarketplaceId']    = $this->config['MarketplaceId'];
        $params['SignatureMethod']  = 'HmacSHA256';
        $params['SignatureVersion'] = '2';
        $params['Timestamp']        = gmdate('Y-m-d\TH:i:s.\\0\\0\\0\\Z', time());

        $secretKey = $this->config['SecretKey'];
        $serviceUrl = $this->config['ServiceUrl'];

        $arr = [];
        foreach ($params as $key => $val) {
            $key = str_replace("%7E", "~", rawurlencode($key));
            $val = str_replace("%7E", "~", rawurlencode($val));
            $arr[] = "{$key}={$val}";
        }

        sort($arr);

        $str = implode('&', $arr);

        $sign  = $this->method . "\n";  // 'GET' | 'POST'
        $sign .= $serviceUrl. "\n";     // 'mws.amazonservices.com'
        $sign .= $path. "\n";           // '/Products/2011-10-01'
        $sign .= $str;

        $signature = hash_hmac("sha256", $sign, $secretKey, true);
        $signature = urlencode(base64_encode($signature));

        // https://mws.amazonservices.com/Products/2011-10-01
        $url = "https://$serviceUrl/$path";
        $data = $str . "&Signature=" . $signature;

        if ($this->method == 'GET') {
            $url = "$url?$data";
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        if ($this->method == 'GET') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        //print_r($response);
        //print_r($info);

        $response = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $response);
        return simplexml_load_string($response);
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function feedApi() { return new FeedApi($this); }
    public function financeApi() { return new FinanceApi($this); }
    public function fulfillmentByAmazonApi() { return new FulfillmentByAmazonApi($this); }
    public function merchantFulfillmentApi() { return new MerchantFulfillmentApi($this); }
    public function offAmazonPaymentApi() { return new OffAmazonPaymentApi($this); }
    public function offAmazonPaymentsSandboxApi() { return new OffAmazonPaymentsSandboxApi($this); }
    public function orderApi() { return new OrderApi($this); }
    public function productApi() { return new ProductApi($this); }
    public function recommendationApi() { return new RecommendationApi($this); }
    public function reportApi() { return new ReportApi($this); }
    public function sellerApi() { return new SellerApi($this); }
    public function subscriptionApi() { return new SubscriptionApi($this); }
}
