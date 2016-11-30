<?php

namespace Amazon\Mws;

class FulfillmentInbound extends MwsApi
{
    const NAME = 'FulfillmentInboundShipment';
    const VERSION = '2010-10-01';
    const PATH = '/FulfillmentInboundShipment/2010-10-01';

    public function confirmPreorder()
    {
        // $params['ShipmentId'] = (Required)
        // $params['NeedByDate'] = (Required) (Type: DateString)

        $this->params['Action'] = 'ConfirmPreorder';

        $response = $this->invoke();

        return $response->ConfirmPreorderResult;
    }

    public function confirmTransportRequest($shipmentId)
    {
        // $params['ShipmentId'] = (Required)

        $this->params['ShipmentId'] = $shipmentId;

        $this->params['Action'] = 'ConfirmTransportRequest';

        $response = $this->invoke();

        return $response->ConfirmTransportRequestResult;
    }

    public function createInboundShipment()
    {
        // $params['ShipmentId'] = (Required)
        // $params['Inbound Shipment Header'] = (Required) (Type: Complex)
        // $params['InboundShipmentItems'] = (Required)  (List) (Type: ComplexList)
        // $params['Inbound Shipment Header'] = (Type: Complex)

        $this->params['Action'] = 'CreateInboundShipment';

        $response = $this->invoke();

        return $response->CreateInboundShipmentResult;
    }

    public function createInboundShipmentPlan()
    {
        // $params['LabelPrepPreference'] = (Required)
        // $params['ShipFromAddress'] = (Required) (Type: Complex)
        // $params['InboundShipmentPlanRequestItems'] = (Required)  (List) (Type: ComplexList)
        // $params['ShipFromAddress'] = (Type: Complex)
        // $params['ShipToCountryCode'] =
        // $params['ShipToCountrySubdivisionCode'] =

        $this->params['Action'] = 'CreateInboundShipmentPlan';

        $response = $this->invoke();

        return $response->CreateInboundShipmentPlanResult;
    }

    public function estimateTransportRequest($shipmentId)
    {
        // $params['ShipmentId'] = (Required)

        $this->params['ShipmentId'] = $shipmentId;

        $this->params['Action'] = 'EstimateTransportRequest';

        $response = $this->invoke();

        return $response->EstimateTransportRequestResult;
    }

    public function getBillOfLading($shipmentId)
    {
        // $params['ShipmentId'] = (Required)

        $this->params['ShipmentId'] = $shipmentId;

        $this->params['Action'] = 'GetBillOfLading';

        $response = $this->invoke();

        return $response->GetBillOfLadingResult;
    }

    public function getInboundGuidanceForASIN()
    {
        // $params['ASINList'] = (Required) (Type: Complex)
        // $params['MarketplaceId'] = (Required)

        $this->params['Action'] = 'GetInboundGuidanceForASIN';

        $response = $this->invoke();

        return $response->GetInboundGuidanceForASINResult;
    }

    public function getInboundGuidanceForSKU()
    {
        // $params['SellerSKUList'] = (Required) (Type: Complex)
        // $params['MarketplaceId'] = (Required)

        $this->params['Action'] = 'GetInboundGuidanceForSKU';

        $response = $this->invoke();

        return $response->GetInboundGuidanceForSKUResult;
    }

    public function getPackageLabels()
    {
        // $params['ShipmentId'] = (Required)
        // $params['PageType'] = (Required) (Type: fba.PageType)
        // $params['NumberOfPackages'] =

        $this->params['Action'] = 'GetPackageLabels';

        $response = $this->invoke();

        return $response->GetPackageLabelsResult;
    }

    public function getPalletLabels()
    {
        // $params['ShipmentId'] = (Required)
        // $params['PageType'] = (Required) (Type: fba.PageType)
        // $params['NumberOfPallets'] = (Required)

        $this->params['Action'] = 'GetPalletLabels';

        $response = $this->invoke();

        return $response->GetPalletLabelsResult;
    }

    public function getPreorderInfo($shipmentId)
    {
        // $params['ShipmentId'] = (Required)

        $this->params['ShipmentId'] = $shipmentId;

        $this->params['Action'] = 'GetPreorderInfo';

        $response = $this->invoke();

        return $response->GetPreorderInfoResult;
    }

    public function getPrepInstructionsForASIN()
    {
        // $params['AsinList'] = (Required) (Type: Complex)
        // $params['ShipToCountryCode'] = (Required)

        $this->params['Action'] = 'GetPrepInstructionsForASIN';

        $response = $this->invoke();

        return $response->GetPrepInstructionsForASINResult;
    }

    public function getPrepInstructionsForSKU()
    {
        // $params['SellerSKUList'] = (Required) (Type: Complex)
        // $params['ShipToCountryCode'] = (Required)

        $this->params['Action'] = 'GetPrepInstructionsForSKU';

        $response = $this->invoke();

        return $response->GetPrepInstructionsForSKUResult;
    }

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function getTransportContent($shipmentId)
    {
        // $params['ShipmentId'] = (Required)

        $this->params['ShipmentId'] = $shipmentId;

        $this->params['Action'] = 'GetTransportContent';

        $response = $this->invoke();

        return $response->GetTransportContentResult;
    }

    public function getUniquePackageLabels()
    {
        // $params['ShipmentId'] = (Required)
        // $params['PageType'] = (Required) (Type: fba.PageType)
        // $params['PackageLabelsToPrint.member.-'] = (Required)  (List)

        $this->params['Action'] = 'GetUniquePackageLabels';

        $response = $this->invoke();

        return $response->GetUniquePackageLabelsResult;
    }

    public function listInboundShipmentItems()
    {
        // $params['ShipmentId'] = (Required)
        // $params['LastUpdatedAfter'] = (Type: Timestamp)
        // $params['LastUpdatedBefore'] = (Type: Timestamp)

        $this->params['Action'] = 'ListInboundShipmentItems';

        $response = $this->invoke();

        return $response->ListInboundShipmentItemsResult;
    }

    public function listInboundShipmentItemsByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'ListInboundShipmentItemsByNextToken';

        $response = $this->invoke();

        return $response->ListInboundShipmentItemsByNextTokenResult;
    }

    public function listInboundShipments()
    {
        // $params['ShipmentStatusList.member.-'] =  (List)
        // $params['ShipmentIdList.member.-'] =  (List)
        // $params['LastUpdatedAfter'] = (Type: Timestamp)
        // $params['LastUpdatedBefore'] = (Type: Timestamp)

        $this->params['Action'] = 'ListInboundShipments';

        $response = $this->invoke();

        return $response->ListInboundShipmentsResult;
    }

    public function listInboundShipmentsByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'ListInboundShipmentsByNextToken';

        $response = $this->invoke();

        return $response->ListInboundShipmentsByNextTokenResult;
    }

    public function putTransportContent()
    {
        // $params['ShipmentId'] = (Required)
        // $params['IsPartnered'] = (Required) (Type: bde.Boolean)
        // $params['ShipmentType'] = (Required) (Type: fba.ShipmentType)
        // $params['TransportDetails'] = (Type: Complex)

        $this->params['Action'] = 'PutTransportContent';

        $response = $this->invoke();

        return $response->PutTransportContentResult;
    }

    public function updateInboundShipment()
    {
        // $params['ShipmentId'] = (Required)
        // $params['Inbound Shipment Header'] = (Required) (Type: Complex)
        // $params['InboundShipmentItems'] = (Required)  (List) (Type: ComplexList)

        $this->params['Action'] = 'UpdateInboundShipment';

        $response = $this->invoke();

        return $response->UpdateInboundShipmentResult;
    }

    public function voidTransportRequest($shipmentId)
    {
        // $params['ShipmentId'] = (Required)

        $this->params['ShipmentId'] = $shipmentId;

        $this->params['Action'] = 'VoidTransportRequest';

        $response = $this->invoke();

        return $response->VoidTransportRequestResult;
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
