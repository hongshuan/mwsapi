<?php

namespace Amazon\Mws;

class Subscriptions extends MwsApi
{
    const NAME = 'Subscriptions';
    const VERSION = '2013-07-01';
    const PATH = '/Subscriptions/2013-07-01';

    public function deregisterDestination($sqsurl)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['Destination'] = (Required) (Type: Complex)

        $this->params['Destination.AttributeList.member.1.Key'] = 'sqsQueueUrl';
        $this->params['Destination.AttributeList.member.1.Value'] = $sqsurl;
        $this->params['Destination.DeliveryChannel'] = 'SQS';

        $this->params['Action'] = 'DeregisterDestination';

        $response = $this->invoke();

        return $response->DeregisterDestinationResult;
    }

    public function getServiceStatus()
    {
        $this->params['Action'] = 'GetServiceStatus';

        $response = $this->invoke();

        return $response->GetServiceStatusResult;
    }

    public function listRegisteredDestinations()
    {
        // $params['MarketplaceId'] = (Required)

        $this->params['Action'] = 'ListRegisteredDestinations';

        $response = $this->invoke();

        return $response->ListRegisteredDestinationsResult;
    }

    public function registerDestination($sqsurl)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['Destination'] = (Required) (Type: Complex)

        $this->params['Destination.AttributeList.member.1.Key'] = 'sqsQueueUrl';
        $this->params['Destination.AttributeList.member.1.Value'] = $sqsurl;
        $this->params['Destination.DeliveryChannel'] = 'SQS';

        $this->params['Action'] = 'RegisterDestination';

        $response = $this->invoke();

        return $response->RegisterDestinationResult;
    }

    public function sendTestNotificationToDestination($sqsurl)
    {
        // $params['MarketplaceId'] = (Required)
        // $params['Destination'] = (Required) (Type: Complex)

        $this->params['Destination.AttributeList.member.1.Key'] = 'sqsQueueUrl';
        $this->params['Destination.AttributeList.member.1.Value'] = $sqsurl;
        $this->params['Destination.DeliveryChannel'] = 'SQS';

        $this->params['Action'] = 'SendTestNotificationToDestination';

        $response = $this->invoke();

        return $response->SendTestNotificationToDestinationResult;
    }

    public function createSubscription($sqsurl, $type = 'AnyOfferChanged')
    {
        // $params['MarketplaceId'] = (Required)
        // $params['Subscription'] = (Required) (Type: Complex)

        $this->params['Subscription.Destination.AttributeList.member.1.Key'] = 'sqsQueueUrl';
        $this->params['Subscription.Destination.AttributeList.member.1.Value'] = $sqsurl;
        $this->params['Subscription.Destination.DeliveryChannel'] = 'SQS';
        $this->params['Subscription.IsEnabled'] = true;
        $this->params['Subscription.NotificationType'] = $type;

        $this->params['Action'] = 'CreateSubscription';

        $response = $this->invoke();

        return $response->CreateSubscriptionResult;
    }

    public function deleteSubscription($sqsurl, $type = 'AnyOfferChanged')
    {
        // $params['MarketplaceId'] = (Required)
        // $params['NotificationType'] = (Required) (Type: subscriptions.NotificationTypes)
        // $params['Destination'] = (Required) (Type: Complex)

        $this->params['Destination.AttributeList.member.1.Key'] = 'sqsQueueUrl';
        $this->params['Destination.AttributeList.member.1.Value'] = $sqsurl;
        $this->params['Destination.DeliveryChannel'] = 'SQS';
        $this->params['NotificationType'] = $type;

        $this->params['Action'] = 'DeleteSubscription';

        $response = $this->invoke();

        return $response->DeleteSubscriptionResult;
    }

    public function getSubscription($sqsurl, $type = 'AnyOfferChanged')
    {
        // $params['MarketplaceId'] = (Required)
        // $params['NotificationType'] = (Required) (Type: subscriptions.NotificationTypes)
        // $params['Destination'] = (Required) (Type: Complex)

        $this->params['Destination.AttributeList.member.1.Key'] = 'sqsQueueUrl';
        $this->params['Destination.AttributeList.member.1.Value'] = $sqsurl;
        $this->params['Destination.DeliveryChannel'] = 'SQS';
        $this->params['NotificationType'] = $type;

        $this->params['Action'] = 'GetSubscription';

        $response = $this->invoke();

        return $response->GetSubscriptionResult;
    }

    public function listSubscriptions()
    {
        // $params['MarketplaceId'] = (Required)

        $this->params['Action'] = 'ListSubscriptions';

        $response = $this->invoke();

        return $response->ListSubscriptionsResult;
    }

    public function updateSubscription($sqsurl, $enabled, $type = 'AnyOfferChanged')
    {
        // $params['MarketplaceId'] = (Required)
        // $params['Subscription'] = (Required) (Type: Complex)

        $this->params['Subscription.Destination.AttributeList.member.1.Key'] = 'sqsQueueUrl';
        $this->params['Subscription.Destination.AttributeList.member.1.Value'] = $sqsurl;
        $this->params['Subscription.Destination.DeliveryChannel'] = 'SQS';
        $this->params['Subscription.IsEnabled'] = $enabled;
        $this->params['Subscription.NotificationType'] = $type;

        $this->params['Action'] = 'UpdateSubscription';

        $response = $this->invoke();

        return $response->UpdateSubscriptionResult;
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
