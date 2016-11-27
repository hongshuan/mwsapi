<?php

namespace Amazon\Mws;

class Client
{
    protected $config;
    protected $logger;

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
    }

    public function httpPost($path, $params, $options = [])
    {
         $params['AWSAccessKeyId']   = $this->config['AccessKey'];
         $params['SellerId']         = $this->config['SellerId'];
         $params['MarketplaceId']    = $this->config['MarketplaceId'];
         $params['SignatureMethod']  = 'HmacSHA256';
         $params['SignatureVersion'] = '2';
         $params['Timestamp']        = gmdate('Y-m-d\TH:i:s.\\0\\0\\0\\Z', time());
    }

    public function sendRequest($url, $params, $options = [])
    {
        // call curlGet($url, $params);
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
