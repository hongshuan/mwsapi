<?php
/*******************************************************************************
 * PHP Version 5
 * @category Amazon
 * @package  MWS Merchant Fulfillment Service
 * @version  2015-06-01
 * Library Version: 2016-03-30
 * Generated: Tue Mar 29 19:00:01 UTC 2016
 */

interface  MWSMerchantFulfillmentService_Interface
{

    /**
     * Cancel Shipment
     * Cancels an existing shipment.  This will only succeed if the cancellation window has not passed and if the shipment
     *     has not been cancelled already.
     *
     * @param mixed $request array of parameters for MWSMerchantFulfillmentService_Model_CancelShipment request or MWSMerchantFulfillmentService_Model_CancelShipment object itself
     * @see MWSMerchantFulfillmentService_Model_CancelShipmentRequest
     * @return MWSMerchantFulfillmentService_Model_CancelShipmentResponse
     *
     * @throws MWSMerchantFulfillmentService_Exception
     */
    public function cancelShipment($request);


    /**
     * Create Shipment
     * Creates a shipment for the shipping information specified.  Purchases and returns a label for the specified
     *     shipping service or shipping service offering.
     *
     * @param mixed $request array of parameters for MWSMerchantFulfillmentService_Model_CreateShipment request or MWSMerchantFulfillmentService_Model_CreateShipment object itself
     * @see MWSMerchantFulfillmentService_Model_CreateShipmentRequest
     * @return MWSMerchantFulfillmentService_Model_CreateShipmentResponse
     *
     * @throws MWSMerchantFulfillmentService_Exception
     */
    public function createShipment($request);


    /**
     * Get Eligible Shipping Services
     * Gets a list of eligible shipping services for the shipment information specified.  The ShippingServiceId or
     *     ShippingServiceOfferingId can be used in CreateShipment to specify the shipping service or the specific offer
     *     respectively.  A list of carriers that are temporarily unavailable is also returned.
     *
     * @param mixed $request array of parameters for MWSMerchantFulfillmentService_Model_GetEligibleShippingServices request or MWSMerchantFulfillmentService_Model_GetEligibleShippingServices object itself
     * @see MWSMerchantFulfillmentService_Model_GetEligibleShippingServicesRequest
     * @return MWSMerchantFulfillmentService_Model_GetEligibleShippingServicesResponse
     *
     * @throws MWSMerchantFulfillmentService_Exception
     */
    public function getEligibleShippingServices($request);


    /**
     * Get Shipment
     * Gets an existing shipment, including the label status, label content, shipping information.
     *
     * @param mixed $request array of parameters for MWSMerchantFulfillmentService_Model_GetShipment request or MWSMerchantFulfillmentService_Model_GetShipment object itself
     * @see MWSMerchantFulfillmentService_Model_GetShipmentRequest
     * @return MWSMerchantFulfillmentService_Model_GetShipmentResponse
     *
     * @throws MWSMerchantFulfillmentService_Exception
     */
    public function getShipment($request);


    /**
     * Get Service Status
     * 
     *
     * @param mixed $request array of parameters for MWSMerchantFulfillmentService_Model_GetServiceStatus request or MWSMerchantFulfillmentService_Model_GetServiceStatus object itself
     * @see MWSMerchantFulfillmentService_Model_GetServiceStatusRequest
     * @return MWSMerchantFulfillmentService_Model_GetServiceStatusResponse
     *
     * @throws MWSMerchantFulfillmentService_Exception
     */
    public function getServiceStatus($request);

}
