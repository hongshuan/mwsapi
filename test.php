<?php

include 'Client.php';

$config = include 'config.php';
$client = new Amazon\Mws\Client($config['StoreNameA']);

$orderApi = $client->orderApi();
