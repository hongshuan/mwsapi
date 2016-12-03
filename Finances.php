<?php

namespace Amazon\Mws;

class Finances extends MwsApi
{
    const NAME = 'Finances';
    const VERSION = '2015-05-01';
    const PATH = '/Finances/2015-05-01';

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function listFinancialEventGroups()
    {
        // $params['FinancialEventGroupStartedAfter'] = (Required) (Type: Timestamp)
        // $params['FinancialEventGroupStartedBefore'] = (Type: Timestamp)
        // $params['MaxResultsPerPage'] =

        $this->params['Action'] = 'ListFinancialEventGroups';

        $response = $this->invoke();

        return $response->ListFinancialEventGroupsResult;
    }

    public function listFinancialEventGroupsByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'ListFinancialEventGroupsByNextToken';

        $response = $this->invoke();

        return $response->ListFinancialEventGroupsByNextTokenResult;
    }

    public function listFinancialEvents()
    {
        // $params['PostedAfter'] = (Type: Timestamp)
        // $params['PostedBefore'] = (Type: Timestamp)
        // $params['FinancialEventGroupId'] =
        // $params['AmazonOrderId'] =
        // $params['MaxResultsPerPage'] =

        $this->params['Action'] = 'ListFinancialEvents';

        $response = $this->invoke();

        return $response->ListFinancialEventsResult;
    }

    public function listFinancialEventsByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'ListFinancialEventsByNextToken';

        $response = $this->invoke();

        return $response->ListFinancialEventsByNextTokenResult;
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
