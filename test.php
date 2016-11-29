<?php

include 'Client.php';
include 'MwsApi.php';
include 'Feeds.php';
include 'Finances.php';
#nclude 'FBAInbound.php';
#nclude 'FBAOutbound.php';
#nclude 'FBAInventory.php';
include 'FulfillmentInbound.php';
include 'FulfillmentInventory.php';
include 'FulfillmentOutbound.php';
include 'MerchantFulfillment.php';
include 'Orders.php';
include 'Products.php';
include 'Recommendations.php';
include 'Reports.php';
include 'Sellers.php';
include 'Subscriptions.php';

#include 'ReportSchedule.php';
#include 'SubscriptionDestinations.php';
#include 'OffAmazonPayments.php';
#include 'OffAmazonPaymentsSandboxApi.php';

$config = include 'logs/config.php';

function testFeedApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $feedApi = $client->feedApi();
    $response = $feedApi->getServiceStatus();
    print_r($response);
}
#testFeedApi($config);

function testFinanceApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $financeApi = $client->financeApi();
    $response = $financeApi->getServiceStatus();
    print_r($response);
}
#testFinanceApi($config);

function testFbaInboundApi($config)
{
    $client = new Amazon\Mws\Client($config);
#   $fbaInboundApi = $client->fbaInboundApi();
    $fbaInboundApi = $client->fulfillmentInboundApi();
    $response = $fbaInboundApi->getServiceStatus();
    print_r($response);
}
#testFbaInboundApi($config);

function testFbaOutboundApi($config)
{
    $client = new Amazon\Mws\Client($config);
#   $fbaOutboundApi = $client->fbaOutboundApi();
    $fbaOutboundApi = $client->fulfillmentOutboundApi();
    $response = $fbaOutboundApi->getServiceStatus();
    print_r($response);
}
#testFbaOutboundApi($config);

function testFbaInventoryApi($config)
{
    $client = new Amazon\Mws\Client($config);
#   $fbaInventoryApi = $client->fbaInventoryApi();
    $fbaInventoryApi = $client->fulfillmentInventoryApi();
    $response = $fbaInventoryApi->getServiceStatus();
    print_r($response);
}
#testFbaInventoryApi($config);

function testMerchantFulfillmentApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $merchantFulfillmentApi = $client->merchantFulfillmentApi();
    $response = $merchantFulfillmentApi->getServiceStatus();
    print_r($response);
}
#testMerchantFulfillmentApi($config);

function testOffAmazonPaymentApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $offAmazonPaymentApi = $client->offAmazonPaymentApi();
    $response = $offAmazonPaymentApi->getServiceStatus();
    print_r($response);
}
#testOffAmazonPaymentApi($config);

function testOffAmazonPaymentsSandboxApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $offAmazonPaymentsSandboxApi = $client->offAmazonPaymentsSandboxApi();
    $response = $offAmazonPaymentsSandboxApi->getServiceStatus();
    print_r($response);
}
#testOffAmazonPaymentsSandboxApi($config);

function testOrderApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $orderApi = $client->orderApi();
#   $response = $orderApi->getServiceStatus();
#   $response = $orderApi->getOrder(['701-2909100-8898624', '701-7599957-6137843']);
    $response = $orderApi->listOrderItems('701-2909100-8898624');
    print_r($response);
}
testOrderApi($config);

function testProductApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $productApi = $client->productApi();
    $response = $productApi->getServiceStatus();
    print_r($response);
}
#testProductApi($config);

function testRecommendationApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $recommendationApi = $client->recommendationApi();
    $response = $recommendationApi->getServiceStatus();
    print_r($response);
}
#testRecommendationApi($config);

function testReportApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $reportApi = $client->reportApi();
    $response = $reportApi->getServiceStatus();
    print_r($response);
}
#testReportApi($config);

function testReportScheduleApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $reportScheduleApi = $client->reportScheduleApi();
    $response = $reportScheduleApi->getServiceStatus();
    print_r($response);
}
#testReportScheduleApi($config);

function testSellerApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $sellerApi = $client->sellerApi();
    $response = $sellerApi->getServiceStatus();
    print_r($response);
}
#testSellerApi($config);

function testSubscriptionApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $subscriptionApi = $client->subscriptionApi();
    $response = $subscriptionApi->getServiceStatus();
    print_r($response);
}
#testSubscriptionApi($config);

function testSubscriptionDestinationApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $subscriptionDestinationApi = $client->subscriptionDestinationApi();
    $response = $subscriptionDestinationApi->getServiceStatus();
    print_r($response);
}
#testSubscriptionDestinationApi($config);
