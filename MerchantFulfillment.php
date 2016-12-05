<?php

namespace Amazon\Mws;

class MerchantFulfillment extends MwsApi
{
    const NAME = 'Merchant Fulfillment';
    const VERSION = '2015-06-01';
    const PATH = '/MerchantFulfillment/2015-06-01';

    public function cancelShipment($shipmentId)
    {
        // $params['ShipmentId'] = (Required)

        $this->params['ShipmentId'] = $shipmentId;

        $this->params['Action'] = 'CancelShipment';

        $response = $this->invoke();

        return $response->CancelShipmentResult;
    }

    public function createShipment()
    {
        // $params['ShippingServiceId'] = (Required)
        // $params['ShippingServiceOfferId'] =
        // $params['ShipmentRequestDetails'] = (Required) (Type: Complex)

        $this->params['Action'] = 'CreateShipment';

        $response = $this->invoke();

        return $response->CreateShipmentResult;
    }

    public function getEligibleShippingServices()
    {
        // $params['ShipmentRequestDetails'] = (Required) (Type: Complex)

        $this->params['Action'] = 'GetEligibleShippingServices';

        $response = $this->invoke();

        return $response->GetEligibleShippingServicesResult;
    }

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function getShipment($shipmentId)
    {
        // $params['ShipmentId'] = (Required)

        $this->params['ShipmentId'] = $shipmentId;

        $this->params['Action'] = 'GetShipment';

        $response = $this->invoke();

        return $response->GetShipmentResult;
    }

    protected function invoke($method = 'GET')
    {
        $path = self::PATH;

        $this->params['Version'] = self::VERSION;

        $response = $this->client->send($method, $path, $this->params);

        $this->params = []; // reset for next api call

        // TODO: parse response
        return $response;
    }

}
