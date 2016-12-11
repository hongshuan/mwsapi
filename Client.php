<?php

namespace Amazon\Mws;

class Client
{
    protected $config;
    protected $logger;
    protected $method; // GET|POST
    protected $path;
    protected $params;
    protected $options;
    protected $postData;

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

    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    public function setPostData($data)
    {
        $this->postData = $data;
    }

    public function send($method, $path, $params, $options = [])
    {
        $this->method  = $method;
        $this->path    = $path;
        $this->params  = $params;
        $this->options = $options;

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

        $queryString = $this->makeQueryString($params);
        $signature = $this->sign($path, $queryString);

        // https://mws.amazonservices.com/Products/2011-10-01
        $serviceUrl = $this->config['ServiceUrl'];
        $url = "https://$serviceUrl$path";
        $data = $queryString . "&Signature=" . $signature;

        $ch = curl_init();

#       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
#       curl_setopt($ch, CURLOPT_VERBOSE, true);
#       curl_setopt($ch, CURLOPT_HEADER, true);

        if ($this->method == 'GET') {
            $url = "$url?$data";
            curl_setopt($ch, CURLOPT_URL, $url);
        }

        if ($this->method == 'POST') {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $this->log($this->method.' '.$url);
        $this->log($data);
        $this->log($response);
#       $this->log($this->formatXml($response));
#       $this->log($info);
        $this->log(str_repeat('-', 80));

        /* GetLowestPricedOffersForSKU returns application/xml, other apis return text/xml */
        if (strpos($info['content_type'], 'xml') !== false) {
            $response = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $response);

            $xml = simplexml_load_string($response);

            if ($xml->getName() == 'ErrorResponse') {
                throw new \Exception($xml->Error->Message);
            }

            return $xml;
        }

        if ($info['http_code'] == 400) {
            throw new \Exception($response);
        }

        return $response;
    }

    protected function makeQueryString($params)
    {
        uksort($params, 'strcmp');

        $arr = [];
        foreach ($params as $key => $val) {
            $key = str_replace("%7E", "~", rawurlencode($key));
            $val = str_replace("%7E", "~", rawurlencode($val));
            $arr[] = "{$key}={$val}";
        }

#       sort($arr);

        $str = implode('&', $arr);

        return $str;
    }

    protected function sign($path, $queryString)
    {
        $secretKey  = $this->config['SecretKey'];
        $serviceUrl = $this->config['ServiceUrl'];

        $sign  = $this->method . "\n";  // 'GET' | 'POST'
        $sign .= $serviceUrl . "\n";    // 'mws.amazonservices.com'
        $sign .= $path . "\n";          // '/Products/2011-10-01'
        $sign .= $queryString;

        $signature = hash_hmac("sha256", $sign, $secretKey, true);
        $signature = base64_encode($signature);

#       if ($this->method == 'GET') {
            $signature = urlencode($signature);
#       }

        return $signature;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function log($message)
    {
        if (!is_scalar($message)) {
            $message = print_r($message, true);
        }

        $today = date('ymd');
        $filename = __DIR__ . "/logs/amazon-mws-$today.log";

       #$text = date('Y-m-d h:i:s ') . $message . "\n";
        $text = trim($message) . "\n\n";
        error_log($text, 3, $filename);
    }

    public function formatXml($xml)
    {
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml);
        $xml = $dom->saveXML();
        return $xml;
    }

    public function feedApi() { return new Feeds($this); }
    public function financeApi() { return new Finances($this); }

    public function fulfillmentInboundApi() { return new FulfillmentInbound($this); }
    public function fulfillmentOutboundApi() { return new FulfillmentOutbound($this); }
    public function fulfillmentInventoryApi() { return new FulfillmentInventory($this); }

    // aliases
    public function fbaInboundApi() { return new FulfillmentInbound($this); }
    public function fbaOutboundApi() { return new FulfillmentOutbound($this); }
    public function fbaInventoryApi() { return new FulfillmentInventory($this); }

    public function merchantFulfillmentApi() { return new MerchantFulfillment($this); }

    public function offAmazonPaymentApi() { return new OffAmazonPayments($this); }
    public function offAmazonPaymentSandboxApi() { return new OffAmazonPaymentSandbox($this); }

    public function orderApi() { return new Orders($this); }
    public function productApi() { return new Products($this); }
    public function recommendationApi() { return new Recommendations($this); }
    public function reportApi() { return new Reports($this); }
    public function reportScheduleApi() { return new ReportSchedule($this); }
    public function sellerApi() { return new Sellers($this); }
    public function subscriptionApi() { return new Subscriptions($this); }
    public function subscriptionDestinationApi() { return new SubscriptionDestinations($this); }
}
