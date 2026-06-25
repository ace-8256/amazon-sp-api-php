<?php
/**
 * OrdersV0Api.
 *
 * @author   Stefan Neuhaus / ClouSale
 */

/**
 * Selling Partner API for Orders.
 *
 * The Selling Partner API for Orders helps you programmatically retrieve order information. These APIs let you develop fast, flexible, custom applications in areas like order synchronization, order research, and demand-based decision support tools.
 *
 * OpenAPI spec version: v0
 */

namespace ClouSale\AmazonSellingPartnerAPI\Api;

use ClouSale\AmazonSellingPartnerAPI\Configuration;
use ClouSale\AmazonSellingPartnerAPI\HeaderSelector;
use ClouSale\AmazonSellingPartnerAPI\Helpers\SellingPartnerApiRequest;
use ClouSale\AmazonSellingPartnerAPI\Models\Orders\GetOrderAddressResponse;
use ClouSale\AmazonSellingPartnerAPI\Models\Orders\GetOrderBuyerInfoResponse;
use ClouSale\AmazonSellingPartnerAPI\Models\Orders\GetOrderItemsBuyerInfoResponse;
use ClouSale\AmazonSellingPartnerAPI\Models\Orders\GetOrderItemsResponse;
use ClouSale\AmazonSellingPartnerAPI\Models\Orders\GetOrderResponse;
use ClouSale\AmazonSellingPartnerAPI\Models\Orders\GetOrdersResponse;
use ClouSale\AmazonSellingPartnerAPI\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class ListingsApi
{
        use SellingPartnerApiRequest;
     /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    public function __construct(Configuration $config)
    {
        $this->client = new Client();
        $this->config = $config;
        $this->headerSelector = new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getOrder.
     *
     * @param string $order_id An Amazon-defined order identifier, in 3-7-7 format. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \ClouSale\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \ClouSale\AmazonSellingPartnerAPI\Models\Orders\GetOrderResponse
     */


     public function getListinfg($marketplace_ids, $last_updated_after = null, $last_updated_before = null,  $fulfillment_channels = null, $payment_methods = null, $buyer_email = null, $seller_id = null, $max_results_per_page = null, $easy_ship_shipment_statuses = null, $next_token = null, $sku )
    {
        list($response) = $this->getOrdersWithHttpInfo($marketplace_ids, $last_updated_after, $last_updated_before, $fulfillment_channels, $payment_methods, $buyer_email, $seller_id, $max_results_per_page, $easy_ship_shipment_statuses, $next_token, $sku);

        return $response;
    }

    public function getOrdersWithHttpInfo($marketplace_ids,  $last_updated_after = null, $last_updated_before = null,  $fulfillment_channels = null, $payment_methods = null, $buyer_email = null, $seller_id , $max_results_per_page = null, $easy_ship_shipment_statuses = null, $next_token = null, $sku = null)
    {

        $request = $this->getOrdersRequest($marketplace_ids,$last_updated_after, $last_updated_before, $fulfillment_channels, $payment_methods, $buyer_email, $seller_id, $max_results_per_page, $easy_ship_shipment_statuses, $next_token, $sku);


        return $this->sendRequest($request, 'string');
    }

    protected function getOrdersRequest($marketplace_ids, $last_updated_after = null, $last_updated_before = null,  $fulfillment_channels = null, $payment_methods = null, $buyer_email = null, $seller_id = null, $max_results_per_page = null, $easy_ship_shipment_statuses = null, $next_token = null, $sku )
    {
        
        
  
        // verify the required parameter 'marketplace_ids' is set
         $marketplace_id=	implode(',',$marketplace_ids);
      
        $resourcePath = "/listings/2021-08-01/items/{$seller_id}/{$sku}?marketplaceIds={$marketplace_id}&issueLocale=en_US&includedData=summaries";
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;
    //  if (is_array($marketplace_ids)) {
    //         $marketplace_ids = ObjectSerializer::serializeCollection($marketplace_ids, 'csv', true);
    //     }
    //     if (null !== $marketplace_ids) {
    //         $queryParams['MarketplaceIds'] = ObjectSerializer::toQueryValue($marketplace_ids);
    //     }
        
        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }


}