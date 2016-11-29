<?php

namespace Amazon\Mws;

class FulfillmentInventory extends MwsApi
{
    const NAME = 'FulfillmentInventory';
    const VERSION = '2010-10-01';
    const PATH = '/FulfillmentInventory/2010-10-01';

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function listInventorySupply()
    {
        // $params['SellerSkus.member.-'] =  (List)
        // $params['QueryStartDateTime'] = (Type: Timestamp)
        // $params['ResponseGroup'] = (Type: fba.ResponseGroups)
        // $params['MarketplaceId'] =

        $this->params['Action'] = 'ListInventorySupply';

        $response = $this->invoke();

        return $response->ListInventorySupplyResult;
    }

    public function listInventorySupplyByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'ListInventorySupplyByNextToken';

        $response = $this->invoke();

        return $response->ListInventorySupplyByNextTokenResult;
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
