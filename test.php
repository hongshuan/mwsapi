<?php

include 'Client.php';

$config = include 'config.php';
$client = new Amazon\Mws\Client($config['StoreNameA']);

$feedApi = $client->feedApi();
$financeApi = $client->financeApi();

$fbaInboundApi = $client->fbaInboundApi();
$fbaOutboundApi = $client->fbaOutboundApi();
$fbaInventoryApi = $client->fbaInventoryApi();

$merchantFulfillmentApi = $client->merchantFulfillmentApi();

$offAmazonPaymentApi = $client->offAmazonPaymentApi();
$offAmazonPaymentsSandboxApi = $client->offAmazonPaymentsSandboxApi();

$orderApi = $client->orderApi();
$productApi = $client->productApi();
$recommendationApi = $client->recommendationApi();
$reportApi = $client->reportApi();
$reportScheduleApi = $client->reportScheduleApi();
$sellerApi = $client->sellerApi();
$subscriptionApi = $client->subscriptionApi();
$subscriptionDestinationApi = $client->subscriptionDestinationApi();
