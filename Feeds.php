<?php

namespace Amazon\Mws;

class Feeds extends MwsApi
{
    const NAME = 'Feeds';
    const VERSION = '2009-01-01';
    const PATH = '/Feeds/2009-01-01';

    public function cancelFeedSubmissions()
    {
        // $params['FeedSubmissionIdList.Id.-'] =  (List)
        // $params['FeedTypeList.Type.-'] =  (List)
        // $params['SubmittedFromDate'] = (Type: Timestamp)
        // $params['SubmittedToDate'] = (Type: Timestamp)

        $this->params['Action'] = 'CancelFeedSubmissions';

        $response = $this->invoke();

        return $response->CancelFeedSubmissionsResult;
    }

    public function getFeedSubmissionCount()
    {
        // $params['FeedTypeList.Type.-'] =  (List)
        // $params['FeedProcessingStatusList.Status.-'] =  (List) (Type: bde.FeedProcessingStatuses)
        // $params['SubmittedFromDate'] = (Type: Timestamp)
        // $params['SubmittedToDate'] = (Type: Timestamp)

        $this->params['Action'] = 'GetFeedSubmissionCount';

        $response = $this->invoke();

        return $response->GetFeedSubmissionCountResult;
    }

    public function getFeedSubmissionList()
    {
        // $params['FeedSubmissionIdList.Id.-'] =  (List)
        // $params['MaxCount'] =
        // $params['FeedTypeList.Type.-'] =  (List)
        // $params['FeedProcessingStatusList.Status.-'] =  (List) (Type: bde.FeedProcessingStatuses)
        // $params['SubmittedFromDate'] = (Type: Timestamp)
        // $params['SubmittedToDate'] = (Type: Timestamp)

        $this->params['Action'] = 'GetFeedSubmissionList';

        $response = $this->invoke();

        return $response->GetFeedSubmissionListResult;
    }

    public function getFeedSubmissionListByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'GetFeedSubmissionListByNextToken';

        $response = $this->invoke();

        return $response->GetFeedSubmissionListByNextTokenResult;
    }

    public function getFeedSubmissionResult($feedSubmissionId)
    {
        // $params['FeedSubmissionId'] = (Required)

        $this->params['FeedSubmissionId'] = $feedSubmissionId;

        $this->params['Action'] = 'GetFeedSubmissionResult';

        $response = $this->invoke();

        return $response->GetFeedSubmissionResultResult;
    }

    public function submitFeed()
    {
        // $params['FeedType'] = (Required)
        // $params['MarketplaceIdList.Id.-'] =  (List)
        // $params['PurgeAndReplace'] = (Type: Checkbox)

        $this->params['Action'] = 'SubmitFeed';

        $response = $this->invoke();

        return $response->SubmitFeedResult;
    }

    protected function invoke()
    {
        $path = self::PATH;

        $this->params['Version'] = self::VERSION;

        $response = $this->client->httpPost($path, $this->params);

        $this->params = []; // reset for next api call

        if ($response->getName() == 'ErrorResponse') {
            throw new \Exception($response->Error->Message);
        }

        // TODO: parse response
        return $response;
    }

}
