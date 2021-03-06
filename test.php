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

#   $response = $feedApi->getServiceStatus();  // no such method
#   $response = $feedApi->getFeedSubmissionCount();
#   $response = $feedApi->getFeedSubmissionList();

    print_r($response);
}
#testFeedApi($config);

#function testFinanceApi($config)
#{
#    $client = new Amazon\Mws\Client($config);
#    $financeApi = $client->financeApi();
#
##   $response = $financeApi->getServiceStatus();
##   $response = $financeApi->listFinancialEventGroups();  // argument required
#
#    print_r($response);
#}
#testFinanceApi($config);

#function testFbaInboundApi($config)
#{
#    $client = new Amazon\Mws\Client($config);
##   $fbaInboundApi = $client->fbaInboundApi();
#    $fbaInboundApi = $client->fulfillmentInboundApi();
#    $response = $fbaInboundApi->getServiceStatus();
#    print_r($response);
#}
##testFbaInboundApi($config);
#
#function testFbaOutboundApi($config)
#{
#    $client = new Amazon\Mws\Client($config);
##   $fbaOutboundApi = $client->fbaOutboundApi();
#    $fbaOutboundApi = $client->fulfillmentOutboundApi();
#    $response = $fbaOutboundApi->getServiceStatus();
#    print_r($response);
#}
##testFbaOutboundApi($config);
#
#function testFbaInventoryApi($config)
#{
#    $client = new Amazon\Mws\Client($config);
##   $fbaInventoryApi = $client->fbaInventoryApi();
#    $fbaInventoryApi = $client->fulfillmentInventoryApi();
#    $response = $fbaInventoryApi->getServiceStatus();
#    print_r($response);
#}
##testFbaInventoryApi($config);
#
#function testMerchantFulfillmentApi($config)
#{
#    $client = new Amazon\Mws\Client($config);
#    $merchantFulfillmentApi = $client->merchantFulfillmentApi();
#    $response = $merchantFulfillmentApi->getServiceStatus();
#    print_r($response);
#}
##testMerchantFulfillmentApi($config);
#
#function testOffAmazonPaymentApi($config)
#{
#    $client = new Amazon\Mws\Client($config);
#    $offAmazonPaymentApi = $client->offAmazonPaymentApi();
#    $response = $offAmazonPaymentApi->getServiceStatus();
#    print_r($response);
#}
##testOffAmazonPaymentApi($config);
#
#function testOffAmazonPaymentsSandboxApi($config)
#{
#    $client = new Amazon\Mws\Client($config);
#    $offAmazonPaymentsSandboxApi = $client->offAmazonPaymentsSandboxApi();
#    $response = $offAmazonPaymentsSandboxApi->getServiceStatus();
#    print_r($response);
#}
##testOffAmazonPaymentsSandboxApi($config);

function testOrderApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $orderApi = $client->orderApi();

#   $response = $orderApi->getServiceStatus();
#   $response = $orderApi->getOrder(['701-2909100-8898624', '701-7599957-6137843']);

    $response = $orderApi->listOrderItems('701-2909100-8898624');

    print_r($response);
}
#testOrderApi($config);

function testProductApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $productApi = $client->productApi();

#   $response = $productApi->getServiceStatus();

#   $response = $productApi->getCompetitivePricingForSKU('SYN-5702777');
#   $response = $productApi->getCompetitivePricingForSKU(['SYN-5702777', 'SYN-5692028']);

#   $response = $productApi->getLowestOfferListingsForSKU('SYN-5702777');
#   $response = $productApi->getLowestOfferListingsForSKU(['SYN-5702777', 'SYN-5692028']);

#   $response = $productApi->getLowestPricedOffersForSKU('SYN-5702777'); // x

#   $response = $productApi->getMyPriceForSKU('SYN-5702777');
#   $response = $productApi->getMyPriceForSKU(['SYN-5702777', 'SYN-5692028']);

#   $response = $productApi->getProductCategoriesForSKU('SYN-5702777');

#   $response = $productApi->getProductCategoriesForSKU('SYN-5702-777'); // Invalid SKU
#   $response = $productApi->getProductCategoriesForSKU('SYN-5702777');

    print_r($response);
}
#testProductApi($config);

function testRecommendationApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $recommendationApi = $client->recommendationApi();

#   $response = $recommendationApi->getServiceStatus();
#   $response = $recommendationApi->listRecommendations();
#   $response = $recommendationApi->getLastUpdatedTimeForRecommendations();

    print_r($response);
}
#testRecommendationApi($config);

function testReportApi($config)
{
    $client = new Amazon\Mws\Client($config);
#   $reportApi = new Amazon\Mws\Reports($client);
    $reportApi = $client->reportApi();

#   $response = $reportApi->getServiceStatus(); // no such method
#   $response = $reportApi->getReport('3551414495017138');
#   $response = $reportApi->getReport('3552210689017138');  // CSV RETURNED, NOT XML,
#   $response = $reportApi->getReportCount();
#   $response = $reportApi->getReportList(); // hasNext = true
#   $response = $reportApi->getReportRequestCount();
#   $response = $reportApi->getReportList(); // hasNext = true
#   $response = $reportApi->getReportScheduleCount();
#   $response = $reportApi->getReportScheduleList(); // hasNext = false

    print_r($response);
}
#testReportApi($config);

function testSellerApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $sellerApi = $client->sellerApi();

#   $response = $sellerApi->getServiceStatus();
#   $response = $sellerApi->listMarketplaceParticipations();

    print_r($response);
}
#testSellerApi($config);

function testSubscriptionApi($config)
{
    $client = new Amazon\Mws\Client($config);
    $subscriptionApi = $client->subscriptionApi();

    $sqsurl = 'https://sqs.us-west-2.amazonaws.com/805174385770/sqs-bte-mws-notification';

#   $response = $subscriptionApi->getServiceStatus();
#   $response = $subscriptionApi->listSubscriptions();
#   $response = $subscriptionApi->listRegisteredDestinations();
#   $response = $subscriptionApi->registerDestination($sqsurl);
#   $response = $subscriptionApi->sendTestNotificationToDestination($sqsurl);
#   $response = $subscriptionApi->createSubscription($sqsurl);
#   $response = $subscriptionApi->getSubscription($sqsurl);
#   $response = $subscriptionApi->deleteSubscription($sqsurl);

    print_r($response);
}
#testSubscriptionApi($config);
