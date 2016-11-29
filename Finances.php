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
    
    public function listFinancialEventGroupsByNextToken()
    {
        // $params['NextToken'] = (Required)
        
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
    
    public function listFinancialEventsByNextToken()
    {
        // $params['NextToken'] = (Required)
        
        $this->params['Action'] = 'ListFinancialEventsByNextToken';
        
        $response = $this->invoke();
        
        return $response->ListFinancialEventsByNextTokenResult;
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

