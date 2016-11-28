<?php

include 'Client.php';
#include 'Feeds.php';
#include 'Finances.php';
#include 'FBAInbound.php';
#include 'FBAOutbound.php';
#include 'FBAInventory.php';
#include 'MerchantFulfillment.php';
#include 'OffAmazonPayments.php';
#include 'OffAmazonPaymentsSandboxApi.php';
#include 'Orders.php';
#include 'Products.php';
#include 'Recommendations.php';
#include 'Reports.php';
#include 'ReportSchedule.php';
#include 'Sellers.php';
#include 'Subscriptions.php';
#include 'SubscriptionDestinations.php';

$config = include 'config.php';

function testFeedApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $feedApi = $client->feedApi();
    $feedApi->getServiceStatus();
}
testFeedApi($config);

function testFinanceApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $financeApi = $client->financeApi();
    $financeApi->getServiceStatus();
}
#testFinanceApi($config);

function testFbaInboundApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $fbaInboundApi = $client->fbaInboundApi();
    $fbaInboundApi->getServiceStatus();
}
#testFbaInboundApi($config);

function testFbaOutboundApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $fbaOutboundApi = $client->fbaOutboundApi();
    $fbaOutboundApi->getServiceStatus();
}
#testFbaOutboundApi($config);

function testFbaInventoryApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $fbaInventoryApi = $client->fbaInventoryApi();
    $fbaInventoryApi->getServiceStatus();
}
#testFbaInventoryApi($config);

function testMerchantFulfillmentApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $merchantFulfillmentApi = $client->merchantFulfillmentApi();
    $merchantFulfillmentApi->getServiceStatus();
}
#testMerchantFulfillmentApi($config);

function testOffAmazonPaymentApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $offAmazonPaymentApi = $client->offAmazonPaymentApi();
    $offAmazonPaymentApi->getServiceStatus();
}
#testOffAmazonPaymentApi($config);

function testOffAmazonPaymentsSandboxApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $offAmazonPaymentsSandboxApi = $client->offAmazonPaymentsSandboxApi();
    $offAmazonPaymentsSandboxApi->getServiceStatus();
}
#testOffAmazonPaymentsSandboxApi($config);

function testOrderApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $orderApi = $client->orderApi();
    $orderApi->getServiceStatus();
}
#testOrderApi($config);

function testProductApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $productApi = $client->productApi();
    $productApi->getServiceStatus();
}
#testProductApi($config);

function testRecommendationApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $recommendationApi = $client->recommendationApi();
    $recommendationApi->getServiceStatus();
}
#testRecommendationApi($config);

function testReportApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $reportApi = $client->reportApi();
    $reportApi->getServiceStatus();
}
#testReportApi($config);

function testReportScheduleApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $reportScheduleApi = $client->reportScheduleApi();
    $reportScheduleApi->getServiceStatus();
}
#testReportScheduleApi($config);

function testSellerApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $sellerApi = $client->sellerApi();
    $sellerApi->getServiceStatus();
}
#testSellerApi($config);

function testSubscriptionApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $subscriptionApi = $client->subscriptionApi();
    $subscriptionApi->getServiceStatus();
}
#testSubscriptionApi($config);

function testSubscriptionDestinationApi($config)
{
    $client = new Amazon\Mws\Client($config['StoreNameA']);
    $subscriptionDestinationApi = $client->subscriptionDestinationApi();
    $subscriptionDestinationApi->getServiceStatus();
}
#testSubscriptionDestinationApi($config);
