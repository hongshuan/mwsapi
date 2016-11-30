<?php
/*******************************************************************************
 * PHP Version 5
 * @category Amazon
 * @package  MWS Recommendations Section Service
 * @version  2013-04-01
 * Library Version: 2015-06-18
 * Generated: Thu Jun 18 19:29:34 GMT 2015
 */

interface  MWSRecommendationsSectionService_Interface
{

    /**
     * Get Last Updated Time For Recommendations
     * Retrieving last updated time for all recommendation categories for the given marketplace and seller. 
     *       If last updated time for a category is null, it indicates no active recommendations for this seller in the given marketplace for this category.
     *
     * @param mixed $request array of parameters for MWSRecommendationsSectionService_Model_GetLastUpdatedTimeForRecommendations request or MWSRecommendationsSectionService_Model_GetLastUpdatedTimeForRecommendations object itself
     * @see MWSRecommendationsSectionService_Model_GetLastUpdatedTimeForRecommendationsRequest
     * @return MWSRecommendationsSectionService_Model_GetLastUpdatedTimeForRecommendationsResponse
     *
     * @throws MWSRecommendationsSectionService_Exception
     */
    public function getLastUpdatedTimeForRecommendations($request);


    /**
     * List Recommendations
     * Retrieving first batch of recommendations.
     *
     * @param mixed $request array of parameters for MWSRecommendationsSectionService_Model_ListRecommendations request or MWSRecommendationsSectionService_Model_ListRecommendations object itself
     * @see MWSRecommendationsSectionService_Model_ListRecommendationsRequest
     * @return MWSRecommendationsSectionService_Model_ListRecommendationsResponse
     *
     * @throws MWSRecommendationsSectionService_Exception
     */
    public function listRecommendations($request);


    /**
     * List Recommendations By Next Token
     * Retrieving recommendation by next token.
     *
     * @param mixed $request array of parameters for MWSRecommendationsSectionService_Model_ListRecommendationsByNextToken request or MWSRecommendationsSectionService_Model_ListRecommendationsByNextToken object itself
     * @see MWSRecommendationsSectionService_Model_ListRecommendationsByNextTokenRequest
     * @return MWSRecommendationsSectionService_Model_ListRecommendationsByNextTokenResponse
     *
     * @throws MWSRecommendationsSectionService_Exception
     */
    public function listRecommendationsByNextToken($request);


    /**
     * Get Service Status
     * 
     *
     * @param mixed $request array of parameters for MWSRecommendationsSectionService_Model_GetServiceStatus request or MWSRecommendationsSectionService_Model_GetServiceStatus object itself
     * @see MWSRecommendationsSectionService_Model_GetServiceStatusRequest
     * @return MWSRecommendationsSectionService_Model_GetServiceStatusResponse
     *
     * @throws MWSRecommendationsSectionService_Exception
     */
    public function getServiceStatus($request);

}
