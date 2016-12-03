<?php

namespace Amazon\Mws;

class Recommendations extends MwsApi
{
    const NAME = 'Recommendations';
    const VERSION = '2013-04-01';
    const PATH = '/Recommendations/2013-04-01';

    public function getLastUpdatedTimeForRecommendations()
    {
        // $params['MarketplaceId'] = (Required)

        $this->params['Action'] = 'GetLastUpdatedTimeForRecommendations';

        $response = $this->invoke();

        return $response->GetLastUpdatedTimeForRecommendationsResult;
    }

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function listRecommendations()
    {
        // $params['MarketplaceId'] = (Required)
        // $params['RecommendationCategory'] = (Type: recommendations.Categories)
        // $params['CategoryQueryList'] =  (List) (Type: Complex)

        $this->params['Action'] = 'ListRecommendations';

        $response = $this->invoke();

        return $response->ListRecommendationsResult;
    }

    public function listRecommendationsByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'ListRecommendationsByNextToken';

        $response = $this->invoke();

        return $response->ListRecommendationsByNextTokenResult;
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
