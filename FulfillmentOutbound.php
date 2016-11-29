<?php

namespace Amazon\Mws;

class FulfillmentOutbound extends MwsApi
{
    const NAME = 'FulfillmentOutboundShipment';
    const VERSION = '2010-10-01';
    const PATH = '/FulfillmentOutboundShipment/2010-10-01/';

    public function cancelFulfillmentOrder()
    {
        // $params['SellerFulfillmentOrderId'] = (Required)

        $this->params['Action'] = 'CancelFulfillmentOrder';

        $response = $this->invoke();

        return $response->CancelFulfillmentOrderResult;
    }

    public function createFulfillmentOrder()
    {
        // $params['MarketplaceId'] =
        // $params['ShipFromCountryCode'] =
        // $params['SellerFulfillmentOrderId'] = (Required)
        // $params['ShippingSpeedCategory'] = (Required) (Type: fba.ShippingSpeedCategory)
        // $params['DisplayableOrderId'] = (Required)
        // $params['DisplayableOrderDateTime'] = (Required) (Type: Timestamp)
        // $params['DisplayableOrderComment'] = (Required)
        // $params['FulfillmentPolicy'] = (Type: fba.FulfillmentPolicy)
        // $params['FulfillmentAction'] =
        // $params['NotificationEmailList.member.-'] =  (List)
        // $params['DestinationAddress'] = (Required) (Type: Complex)
        // $params['Items'] = (Required)  (List) (Type: Complex)

        $this->params['Action'] = 'CreateFulfillmentOrder';

        $response = $this->invoke();

        return $response->CreateFulfillmentOrderResult;
    }

    public function createFulfillmentReturn()
    {
        // $params['SellerFulfillmentOrderId'] = (Required)
        // $params['Items'] = (Required)  (List) (Type: Complex)

        $this->params['Action'] = 'CreateFulfillmentReturn';

        $response = $this->invoke();

        return $response->CreateFulfillmentReturnResult;
    }

    public function getFulfillmentOrder()
    {
        // $params['SellerFulfillmentOrderId'] = (Required)

        $this->params['Action'] = 'GetFulfillmentOrder';

        $response = $this->invoke();

        return $response->GetFulfillmentOrderResult;
    }

    public function getFulfillmentPreview()
    {
        // $params['MarketplaceId'] =
        // $params['Address'] = (Required) (Type: Complex)
        // $params['Items'] = (Required)  (List) (Type: Complex)
        // $params['ShippingSpeedCategories.member.-'] =  (List) (Type: fba.ShippingSpeedCategory)

        $this->params['Action'] = 'GetFulfillmentPreview';

        $response = $this->invoke();

        return $response->GetFulfillmentPreviewResult;
    }

    public function getPackageTrackingDetails()
    {
        // $params['PackageNumber'] = (Required)

        $this->params['Action'] = 'GetPackageTrackingDetails';

        $response = $this->invoke();

        return $response->GetPackageTrackingDetailsResult;
    }

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function listAllFulfillmentOrders()
    {
        // $params['QueryStartDateTime'] = (Required) (Type: Timestamp)

        $this->params['Action'] = 'ListAllFulfillmentOrders';

        $response = $this->invoke();

        return $response->ListAllFulfillmentOrdersResult;
    }

    public function listAllFulfillmentOrdersByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'ListAllFulfillmentOrdersByNextToken';

        $response = $this->invoke();

        return $response->ListAllFulfillmentOrdersByNextTokenResult;
    }

    public function listReturnReasonCodes()
    {
        // $params['MarketplaceId'] =
        // $params['SellerFulfillmentOrderId'] =
        // $params['SellerSKU'] = (Required)
        // $params['Language'] =

        $this->params['Action'] = 'ListReturnReasonCodes';

        $response = $this->invoke();

        return $response->ListReturnReasonCodesResult;
    }

    public function updateFulfillmentOrder()
    {
        // $params['MarketplaceId'] =
        // $params['ShipFromCountryCode'] =
        // $params['SellerFulfillmentOrderId'] = (Required)
        // $params['ShippingSpeedCategory'] = (Type: fba.ShippingSpeedCategory)
        // $params['DisplayableOrderId'] =
        // $params['DisplayableOrderDateTime'] = (Type: Timestamp)
        // $params['DisplayableOrderComment'] =
        // $params['FulfillmentPolicy'] = (Type: fba.FulfillmentPolicy)
        // $params['FulfillmentAction'] =
        // $params['NotificationEmailList.member.-'] =  (List)
        // $params['DestinationAddress'] = (Type: Complex)
        // $params['Items'] =  (List) (Type: Complex)

        $this->params['Action'] = 'UpdateFulfillmentOrder';

        $response = $this->invoke();

        return $response->UpdateFulfillmentOrderResult;
    }

    protected function invoke()
    {
        $path = self::PATH;

        $this->params['Version'] = self::VERSION;

        $response = $this->client->httpGet($path, $this->params);

        $this->params = []; // reset for next api call

        if ($response->getName() == 'ErrorResponse') {
            throw new \Exception($response->Error->Message);
        }

        // TODO: parse response
        return $response;
    }

}
