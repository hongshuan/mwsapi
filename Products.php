<?php

namespace Amazon\Mws;

class Products extends MwsApi
{
    const NAME = 'Products';
    const VERSION = '2011-10-01';
    const PATH = '/Products/2011-10-01';

    public function getCompetitivePricingForASIN($asins)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ASINList.ASIN.-'] = (Required)  (List)

        $this->setAsinList($asins);

        $this->params['Action'] = 'GetCompetitivePricingForASIN';

        $response = $this->invoke();

        $this->toArray($response->GetCompetitivePricingForASINResult);
    }

    public function getCompetitivePricingForSKU($skus)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['SellerSKUList.SellerSKU.-'] = (Required)  (List)

        $this->setSkuList($skus);

        $this->params['Action'] = 'GetCompetitivePricingForSKU';

        $response = $this->invoke();

        return $this->toArray($response->GetCompetitivePricingForSKUResult);
    }

    public function getLowestOfferListingsForASIN($asins)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ItemCondition'] =
        // $params['ExcludeMe'] = (Type: bde.Boolean)
        // $params['ASINList.ASIN.-'] = (Required)  (List)

        $this->setAsinList($asins);

        $this->params['Action'] = 'GetLowestOfferListingsForASIN';

        $response = $this->invoke();

        return $this->toArray($response->GetLowestOfferListingsForASINResult);
    }

    public function getLowestOfferListingsForSKU($skus)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ItemCondition'] =
        // $params['ExcludeMe'] = (Type: bde.Boolean)
        // $params['SellerSKUList.SellerSKU.-'] = (Required)  (List)

        $this->setSkuList($skus);

        $this->params['Action'] = 'GetLowestOfferListingsForSKU';

        $response = $this->invoke();

        return $this->toArray($response->GetLowestOfferListingsForSKUResult);
    }

    public function getLowestPricedOffersForASIN($asin)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ASIN'] = (Required)
        // $params['ItemCondition'] = (Required)

        $this->params['ASIN'] = $asin;

        $this->params['Action'] = 'GetLowestPricedOffersForASIN';

        $response = $this->invoke();

        return $response->GetLowestPricedOffersForASINResult;
    }

    public function getLowestPricedOffersForSKU($sku, $itemCondition='New')
    {
        // $params['MarketplaceId'] = (Required)
        // $params['SellerSKU'] = (Required)
        // $params['ItemCondition'] = (Required)

        $this->params['SellerSKU'] = $sku;
        $this->params['ItemCondition'] = $itemCondition;

        $this->params['Action'] = 'GetLowestPricedOffersForSKU';

        $response = $this->invoke();

        return $response->GetLowestPricedOffersForSKUResult;
    }

    public function getMatchingProduct($asins)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ASINList.ASIN.-'] = (Required)  (List)

        $this->setAsinList($asins);

        $this->params['Action'] = 'GetMatchingProduct';

        $response = $this->invoke();

        return $this->toArray($response->GetMatchingProductResult);
    }

    public function getMatchingProductForId()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['IdType'] = (Required)
        // $params['IdList.Id.-'] = (Required)  (List)

        $this->params['Action'] = 'GetMatchingProductForId';

        $response = $this->invoke();

        return $response->GetMatchingProductForIdResult;
    }

    public function getMyFeesEstimate()
    {
        // $params['FeesEstimateRequestList'] = (Required)  (List) (Type: Complex)

        $this->params['Action'] = 'GetMyFeesEstimate';

        $response = $this->invoke();

        return $response->GetMyFeesEstimateResult;
    }

    public function getMyPriceForASIN($asins)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ItemCondition'] =
        // $params['ASINList.ASIN.-'] = (Required)  (List)

        $this->setAsinList($asins);

        $this->params['Action'] = 'GetMyPriceForASIN';

        $response = $this->invoke();

        return $this->toArray($response->GetMyPriceForASINResult);
    }

    public function getMyPriceForSKU($skus)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ItemCondition'] =
        // $params['SellerSKUList.SellerSKU.-'] = (Required)  (List)

        $this->setSkuList($skus);

        $this->params['Action'] = 'GetMyPriceForSKU';

        $response = $this->invoke();

        return $this->toArray($response->GetMyPriceForSKUResult);
    }

    public function getProductCategoriesForASIN($asin)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ASIN'] = (Required)

        $this->params['ASIN'] = $asin;

        $this->params['Action'] = 'GetProductCategoriesForASIN';

        $response = $this->invoke();

        return $response->GetProductCategoriesForASINResult;
    }

    public function getProductCategoriesForSKU($sku)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['SellerSKU'] = (Required)

        $this->params['SellerSKU'] = $sku;

        $this->params['Action'] = 'GetProductCategoriesForSKU';

        $response = $this->invoke();

        return $response->GetProductCategoriesForSKUResult;
    }

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function listMatchingProducts()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['Query'] = (Required)
        // $params['QueryContextId'] =

        $this->params['Action'] = 'ListMatchingProducts';

        $response = $this->invoke();

        return $response->ListMatchingProductsResult;
    }

    protected function setSkuList($skus)
    {
        if (!is_array($skus)) {
            $skus = (array)$skus;
        }

        $N = 1;
        foreach ($skus as $sku) {
            $this->params["SellerSKUList.SellerSKU.$N"] = $sku;
            $N++;
        }
    }

    protected function setAsinList($asins)
    {
        if (!is_array($asins)) {
            $asins = (array)$asins;
        }

        $N = 1;
        foreach ($asins as $asin) {
            $this->params["ASINList.ASIN.$N"] = $asin;
            $N++;
        }
    }

    protected function invoke($method = 'GET')
    {
        $path = self::PATH;

        $this->params['Version'] = self::VERSION;

        $response = $this->client->send($method, $path, $this->params);

        $this->params = []; // reset for next api call

        if ($response->getName() == 'ErrorResponse') {
            throw new \Exception($response->Error->Message);
        }

        // TODO: parse response
        return $response;
    }

}
