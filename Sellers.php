<?php

namespace Amazon\Mws;

class Sellers extends MwsApi
{
    const NAME = 'Sellers';
    const VERSION = '2011-07-01';
    const PATH = '/Sellers/2011-07-01';

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function listMarketplaceParticipations()
    {
        $this->params['Action'] = 'ListMarketplaceParticipations';

        $response = $this->invoke();

        return $response->ListMarketplaceParticipationsResult;
    }

    public function listMarketplaceParticipationsByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'ListMarketplaceParticipationsByNextToken';

        $response = $this->invoke();

        return $response->ListMarketplaceParticipationsByNextTokenResult;
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
