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

$config = include 'logs/config.php';

function testFeedApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $feedApi = $client->feedApi();
    $response = $feedApi->getServiceStatus();
    print_r($response);
}
testFeedApi($config);

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
    $fbaInboundApi = $client->fbaInboundApi();
    $response = $fbaInboundApi->getServiceStatus();
    print_r($response);
}
#testFbaInboundApi($config);

function testFbaOutboundApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $fbaOutboundApi = $client->fbaOutboundApi();
    $response = $fbaOutboundApi->getServiceStatus();
    print_r($response);
}
#testFbaOutboundApi($config);

function testFbaInventoryApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $fbaInventoryApi = $client->fbaInventoryApi();
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
    $response = $orderApi->getServiceStatus();
    print_r($response);
}
#testOrderApi($config);

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
