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

    public function listMarketplaceParticipationsByNextToken()
    {
        // $params['NextToken'] = (Required)

        $this->params['Action'] = 'ListMarketplaceParticipationsByNextToken';

        $response = $this->invoke();

        return $response->ListMarketplaceParticipationsByNextTokenResult;
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
