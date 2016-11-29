<?php

namespace Amazon\Mws;

class Products extends MwsApi
{
    const NAME = 'Products';
    const VERSION = '2011-10-01';
    const PATH = '/Products/2011-10-01';
    
    public function getCompetitivePricingForASIN()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ASINList.ASIN.-'] = (Required)  (List)
        
        $this->params['Action'] = 'GetCompetitivePricingForASIN';
        
        $response = $this->invoke();
        
        return $response->GetCompetitivePricingForASINResult;
    }
    
    public function getCompetitivePricingForSKU()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['SellerSKUList.SellerSKU.-'] = (Required)  (List)
        
        $this->params['Action'] = 'GetCompetitivePricingForSKU';
        
        $response = $this->invoke();
        
        return $response->GetCompetitivePricingForSKUResult;
    }
    
    public function getLowestOfferListingsForASIN()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ItemCondition'] =
        // $params['ExcludeMe'] = (Type: bde.Boolean)
        // $params['ASINList.ASIN.-'] = (Required)  (List)
        
        $this->params['Action'] = 'GetLowestOfferListingsForASIN';
        
        $response = $this->invoke();
        
        return $response->GetLowestOfferListingsForASINResult;
    }
    
    public function getLowestOfferListingsForSKU()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ItemCondition'] =
        // $params['ExcludeMe'] = (Type: bde.Boolean)
        // $params['SellerSKUList.SellerSKU.-'] = (Required)  (List)
        
        $this->params['Action'] = 'GetLowestOfferListingsForSKU';
        
        $response = $this->invoke();
        
        return $response->GetLowestOfferListingsForSKUResult;
    }
    
    public function getLowestPricedOffersForASIN()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ASIN'] = (Required)
        // $params['ItemCondition'] = (Required)
        
        $this->params['Action'] = 'GetLowestPricedOffersForASIN';
        
        $response = $this->invoke();
        
        return $response->GetLowestPricedOffersForASINResult;
    }
    
    public function getLowestPricedOffersForSKU()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['SellerSKU'] = (Required)
        // $params['ItemCondition'] = (Required)
        
        $this->params['Action'] = 'GetLowestPricedOffersForSKU';
        
        $response = $this->invoke();
        
        return $response->GetLowestPricedOffersForSKUResult;
    }
    
    public function getMatchingProduct()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ASINList.ASIN.-'] = (Required)  (List)
        
        $this->params['Action'] = 'GetMatchingProduct';
        
        $response = $this->invoke();
        
        return $response->GetMatchingProductResult;
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
    
    public function getMyPriceForASIN()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ItemCondition'] =
        // $params['ASINList.ASIN.-'] = (Required)  (List)
        
        $this->params['Action'] = 'GetMyPriceForASIN';
        
        $response = $this->invoke();
        
        return $response->GetMyPriceForASINResult;
    }
    
    public function getMyPriceForSKU()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ItemCondition'] =
        // $params['SellerSKUList.SellerSKU.-'] = (Required)  (List)
        
        $this->params['Action'] = 'GetMyPriceForSKU';
        
        $response = $this->invoke();
        
        return $response->GetMyPriceForSKUResult;
    }
    
    public function getProductCategoriesForASIN()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['ASIN'] = (Required)
        
        $this->params['Action'] = 'GetProductCategoriesForASIN';
        
        $response = $this->invoke();
        
        return $response->GetProductCategoriesForASINResult;
    }
    
    public function getProductCategoriesForSKU()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['SellerSKU'] = (Required)
        
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
    
    protected function invoke()
    {
        $path = self::PATH;
        
        $this->params['Version'] = self::VERSION;
        
        $response = $this->client->httpGet($path, $this->params);
        
        $this->params = []; // reset for next api call
        
        // TODO: parse response
        return $response;
    }
    
}
