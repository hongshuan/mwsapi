<?php

namespace Amazon\Mws;

class Reports extends MwsApi
{
    const NAME = 'Reports';
    const VERSION = '2009-01-01';
    const PATH = '/Reports/2009-01-01';

    public function cancelReportRequests()
    {
        // $params['RequestedFromDate'] = (Type: Timestamp)
        // $params['RequestedToDate'] = (Type: Timestamp)
        // $params['ReportRequestIdList.Id.-'] =  (List)
        // $params['ReportTypeList.Type.-'] =  (List)
        // $params['ReportProcessingStatusList.Status.-'] =  (List) (Type: bde.ReportProcessingStatuses)

        $this->params['Action'] = 'CancelReportRequests';

        $response = $this->invoke();

        return $response->CancelReportRequestsResult;
    }

    public function getReport($reportId)
    {
        // $params['ReportId'] = (Required)

        $this->params['ReportId'] = $reportId;

        $this->params['Action'] = 'GetReport';

        $response = $this->invoke();

        return $response->GetReportResult;
    }

    public function getReportCount()
    {
        // $params['ReportTypeList.Type.-'] =  (List)
        // $params['Acknowledged'] = (Type: bde.Boolean)
        // $params['AvailableFromDate'] = (Type: Timestamp)
        // $params['AvailableToDate'] = (Type: Timestamp)

        $this->params['Action'] = 'GetReportCount';

        $response = $this->invoke();

        return $response->GetReportCountResult;
    }

    public function getReportList()
    {
        // $params['MaxCount'] =
        // $params['ReportTypeList.Type.-'] =  (List)
        // $params['Acknowledged'] = (Type: bde.Boolean)
        // $params['AvailableFromDate'] = (Type: Timestamp)
        // $params['AvailableToDate'] = (Type: Timestamp)
        // $params['ReportRequestIdList.Id.-'] =  (List)

        $this->params['Action'] = 'GetReportList';

        $response = $this->invoke();

        return $response->GetReportListResult;
    }

    public function getReportListByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'GetReportListByNextToken';

        $response = $this->invoke();

        return $response->GetReportListByNextTokenResult;
    }

    public function getReportRequestCount()
    {
        // $params['RequestedFromDate'] = (Type: Timestamp)
        // $params['RequestedToDate'] = (Type: Timestamp)
        // $params['ReportTypeList.Type.-'] =  (List)
        // $params['ReportProcessingStatusList.Status.-'] =  (List) (Type: bde.ReportProcessingStatuses)

        $this->params['Action'] = 'GetReportRequestCount';

        $response = $this->invoke();

        return $response->GetReportRequestCountResult;
    }

    public function getReportRequestList()
    {
        // $params['MaxCount'] =
        // $params['RequestedFromDate'] = (Type: Timestamp)
        // $params['RequestedToDate'] = (Type: Timestamp)
        // $params['ReportRequestIdList.Id.-'] =  (List)
        // $params['ReportTypeList.Type.-'] =  (List)
        // $params['ReportProcessingStatusList.Status.-'] =  (List) (Type: bde.ReportProcessingStatuses)

        $this->params['Action'] = 'GetReportRequestList';

        $response = $this->invoke();

        return $response->GetReportRequestListResult;
    }

    public function getReportRequestListByNextToken($nextToken)
    {
        // $params['NextToken'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'GetReportRequestListByNextToken';

        $response = $this->invoke();

        return $response->GetReportRequestListByNextTokenResult;
    }

    public function requestReport()
    {
        // $params['ReportType'] = (Required)
        // $params['MarketplaceIdList.Id.-'] =  (List)
        // $params['StartDate'] = (Type: Timestamp)
        // $params['EndDate'] = (Type: Timestamp)
        // $params['ReportOptions'] =

        $this->params['Action'] = 'RequestReport';

        $response = $this->invoke();

        return $response->RequestReportResult;
    }

    public function getReportScheduleCount()
    {
        // $params['ReportTypeList.Type.-'] =  (List)

        $this->params['Action'] = 'GetReportScheduleCount';

        $response = $this->invoke();

        return $response->GetReportScheduleCountResult;
    }

    public function getReportScheduleList()
    {
        // $params['ReportTypeList.Type.-'] =  (List)

        $this->params['Action'] = 'GetReportScheduleList';

        $response = $this->invoke();

        return $response->GetReportScheduleListResult;
    }

    public function getReportScheduleListByNextToken($nextToken)
    {
        // $params['NextToken.-'] = (Required)

        $this->params['NextToken'] = $nextToken;

        $this->params['Action'] = 'GetReportScheduleListByNextToken';

        $response = $this->invoke();

        return $response->GetReportScheduleListByNextTokenResult;
    }

    public function manageReportSchedule()
    {
        // $params['ReportType'] = (Required)
        // $params['Schedule'] = (Required) (Type: bde.Schedules)
        // $params['ScheduleDate'] = (Type: Timestamp)

        $this->params['Action'] = 'ManageReportSchedule';

        $response = $this->invoke();

        return $response->ManageReportScheduleResult;
    }

    public function updateReportAcknowledgements()
    {
        // $params['ReportIdList.Id.-'] = (Required)  (List)
        // $params['Acknowledged'] = (Type: bde.Boolean)

        $this->params['Action'] = 'UpdateReportAcknowledgements';

        $response = $this->invoke();

        return $response->UpdateReportAcknowledgementsResult;
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
