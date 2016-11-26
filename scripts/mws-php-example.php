<?php

$param = array();
$param['AWSAccessKeyId']    = 'AKIAIIO2KAQ5XZ4U344A'; 
$param['Action']            = 'GetLowestOfferListingsForASIN';
$param['SellerId']          = 'A19N3NI8X4F24J'; 
$param['SignatureMethod']   = 'HmacSHA256';  
$param['SignatureVersion']  = '2'; 
$param['Timestamp']         = gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", time());
$param['Version']           = '2011-10-01'; 
$param['MarketplaceId']     = 'A2EUQ1WTGCTBG2';
$param['ItemCondition']     = 'new';

// get all variations (limit 9)
$variations = [ 'B00000194U', 'B000001OKH', 'B000001ONG' ];
$inc = 1;
foreach ($variations as $key => $asin){
    if ($inc <= 9) { $param['ASINList.ASIN.' . $inc] = $asin; }
    $inc++;
}

$secret = 'o90xuUe/Xb4N9ns3KpcpiKFJLsflZmDkSW8g5NYH';

$url = array();
foreach ($param as $key => $val) {
    $key = str_replace("%7E", "~", rawurlencode($key));
    $val = str_replace("%7E", "~", rawurlencode($val));
    $url[] = "{$key}={$val}";
}

sort($url);

$arr   = implode('&', $url);

$sign  = 'GET' . "\n";
$sign .= 'mws.amazonservices.com' . "\n";
$sign .= '/Products/2011-10-01' . "\n";
$sign .= $arr;

$signature = hash_hmac("sha256", $sign, $secret, true);
$signature = urlencode(base64_encode($signature));

$link  = "https://mws.amazonservices.com/Products/2011-10-01?";
$link .= $arr . "&Signature=" . $signature;

$ch = curl_init($link);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
$response = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

print_r($response);

$response = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $response);
$price_data = simplexml_load_string($response);

print_r($price_data);

$node = $price_data->GetLowestOfferListingsForASINResult->Product;
foreach($node as $product){
    $asin = $product->Identifiers->MarketplaceASIN->ASIN;

    $node = $product->LowestOfferListings->LowestOfferListing->Price->LandedPrice;
    foreach($node as $price){
        $amzn_price = $price->Amount;
    }

    echo "$asin  $amzn_price\n";
}
