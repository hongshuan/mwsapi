<?php

namespace Amazon\Mws;

class Orders extends MwsApi
{
    const NAME = 'Orders';
    const VERSION = '2013-09-01';
    const PATH = '/Orders/2013-09-01';

    public function getOrder($orderId)
    {
        // $params['AmazonOrderId.Id.-'] = (Required)  (List)
        
        if (!is_array($orderId)) {
            $orderId = (array)$orderId;
        }

        $N = 1;
        foreach ($orderId as $id) {
            $this->params["AmazonOrderId.Id.$N"] = $id;
            $N++;
        }
        
        $this->params['Action'] = 'GetOrder';

        $response = $this->invoke();

        return $response->GetOrderResult;
    }

    public function getServiceStatus()
    {

        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function listOrderItems()
    {
        // $params['AmazonOrderId'] = (Required)

        $this->params['Action'] = 'ListOrderItems';

        $response = $this->invoke();

        return $response->ListOrderItemsResult;
    }

    public function listOrderItemsByNextToken()
    {
        // $params['NextToken'] = (Required)

        $this->params['Action'] = 'ListOrderItemsByNextToken';

        $response = $this->invoke();

        return $response->ListOrderItemsByNextTokenResult;
    }

    public function listOrders()
    {
        // $params['CreatedAfter'] = (Type: Timestamp)
        // $params['CreatedBefore'] = (Type: Timestamp)
        // $params['LastUpdatedAfter'] = (Type: Timestamp)
        // $params['LastUpdatedBefore'] = (Type: Timestamp)
        // $params['MarketplaceId.Id.-'] = (Required)  (List)
        // $params['OrderStatus.Status.-'] =  (List) (Type: orders.OrderStatuses)
        // $params['FulfillmentChannel.Channel.-'] =  (List) (Type: orders.FulfillmentChannels)
        // $params['SellerOrderId'] =
        // $params['BuyerEmail'] =
        // $params['PaymentMethod.Method.-'] =  (List) (Type: orders.PaymentMethods)
        // $params['TFMShipmentStatus.Status.-'] =  (List)
        // $params['MaxResultsPerPage'] =

        $this->params['Action'] = 'ListOrders';

        $response = $this->invoke();

        return $response->ListOrdersResult;
    }

    public function listOrdersByNextToken()
    {
        // $params['NextToken'] = (Required)

        $this->params['Action'] = 'ListOrdersByNextToken';

        $response = $this->invoke();

        return $response->ListOrdersByNextTokenResult;
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

