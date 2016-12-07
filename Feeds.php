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

    public function submitFeed($type, $content)
    {
        // $params['FeedType'] = (Required)
        // $params['MarketplaceIdList.Id.-'] =  (List)
        // $params['PurgeAndReplace'] = (Type: Checkbox)

        // $content = file_get_contents($file);

        $this->$params['FeedType'] = $type;
        $this->$params['ContentMD5Value'] = base64_encode(md5($content, true));

        $this->client->setPostData($content);

        $this->params['Action'] = 'SubmitFeed';

        $response = $this->invoke('POST');

        $this->client->setPostData(null); // clear for next call

        return $response->SubmitFeedResult;
    }

    protected function invoke($method='GET')
    {
        $path = self::PATH;

        $this->params['Version'] = self::VERSION;

        $response = $this->client->send($method, $path, $this->params);

        $this->params = []; // reset for next api call

        // TODO: parse response
        return $response;
    }

}
