<?php
/**
 * wallee SDK
 *
 * This library allows to interact with the wallee payment service.
 * wallee SDK: 1.0.0
 * 
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Wallee\Sdk\Service;

use Wallee\Sdk\ApiClient;
use Wallee\Sdk\ApiException;
use Wallee\Sdk\ApiResponse;
use Wallee\Sdk\Http\HttpRequest;

/**
 * TransactionInvoiceService service
 *
 * @category Class
 * @package  Wallee\Sdk
 * @author   customweb GmbH
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 */
class TransactionInvoiceService {

	/**
	 * The API client instance.
	 *
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * Constructor.
	 *
	 * @param ApiClient $apiClient the api client
	 */
	public function __construct(ApiClient $apiClient) {
		if ($apiClient == null) {
			throw new \InvalidArgumentException('The api client is required.');
		}

		$this->apiClient = $apiClient;
	}

	/**
	 * Returns the API client instance.
	 *
	 * @return ApiClient
	 */
	public function getApiClient() {
		return $this->apiClient;
	}


	/**
	 * Operation count
	 *
	 * Count
	 *
	 * @param int $spaceId  (required)
	 * @param \Wallee\Sdk\Model\EntityQueryFilter $filter The filter which restricts the entities which are used to calculate the count. (optional)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return int
	 */
	public function count($spaceId, $filter = null) {
		return $this->countWithHttpInfo($spaceId, $filter)->getData();
	}

	/**
	 * Operation countWithHttpInfo
	 *
	 * Count
	 *
	 * @param int $spaceId  (required)
	 * @param \Wallee\Sdk\Model\EntityQueryFilter $filter The filter which restricts the entities which are used to calculate the count. (optional)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function countWithHttpInfo($spaceId, $filter = null) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling count');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('application/json;charset=utf-8'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}

		// path params
		$resourcePath = "/transaction-invoice/count";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		// body params
		$tempBody = null;
		if (isset($filter)) {
			$tempBody = $filter;
		}

		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'int',
				'/transaction-invoice/count'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), 'int', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), 'int', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

	/**
	 * Operation getInvoiceDocument
	 *
	 * getInvoiceDocument
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoice to get the document for. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return \Wallee\Sdk\Model\RenderedDocument
	 */
	public function getInvoiceDocument($spaceId, $id) {
		return $this->getInvoiceDocumentWithHttpInfo($spaceId, $id)->getData();
	}

	/**
	 * Operation getInvoiceDocumentWithHttpInfo
	 *
	 * getInvoiceDocument
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoice to get the document for. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function getInvoiceDocumentWithHttpInfo($spaceId, $id) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling getInvoiceDocument');
		}
		// verify the required parameter 'id' is set
		if ($id === null) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling getInvoiceDocument');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('*/*'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}
		if ($id !== null) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = "/transaction-invoice/getInvoiceDocument";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'GET',
				$queryParams,
				$httpBody,
				$headerParams,
				'\Wallee\Sdk\Model\RenderedDocument',
				'/transaction-invoice/getInvoiceDocument'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\Wallee\Sdk\Model\RenderedDocument', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\RenderedDocument', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

	/**
	 * Operation getInvoiceDocumentWithTargetMediaType
	 *
	 * getInvoiceDocumentWithTargetMediaType
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoice to get the document for. (required)
	 * @param int $targetMediaTypeId The id of the target media type for which the invoice should be generated for. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return \Wallee\Sdk\Model\RenderedDocument
	 */
	public function getInvoiceDocumentWithTargetMediaType($spaceId, $id, $targetMediaTypeId) {
		return $this->getInvoiceDocumentWithTargetMediaTypeWithHttpInfo($spaceId, $id, $targetMediaTypeId)->getData();
	}

	/**
	 * Operation getInvoiceDocumentWithTargetMediaTypeWithHttpInfo
	 *
	 * getInvoiceDocumentWithTargetMediaType
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoice to get the document for. (required)
	 * @param int $targetMediaTypeId The id of the target media type for which the invoice should be generated for. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function getInvoiceDocumentWithTargetMediaTypeWithHttpInfo($spaceId, $id, $targetMediaTypeId) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling getInvoiceDocumentWithTargetMediaType');
		}
		// verify the required parameter 'id' is set
		if ($id === null) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling getInvoiceDocumentWithTargetMediaType');
		}
		// verify the required parameter 'targetMediaTypeId' is set
		if ($targetMediaTypeId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $targetMediaTypeId when calling getInvoiceDocumentWithTargetMediaType');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('*/*'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}
		if ($id !== null) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}
		if ($targetMediaTypeId !== null) {
			$queryParams['targetMediaTypeId'] = $this->apiClient->getSerializer()->toQueryValue($targetMediaTypeId);
		}

		// path params
		$resourcePath = "/transaction-invoice/getInvoiceDocumentWithTargetMediaType";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'GET',
				$queryParams,
				$httpBody,
				$headerParams,
				'\Wallee\Sdk\Model\RenderedDocument',
				'/transaction-invoice/getInvoiceDocumentWithTargetMediaType'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\Wallee\Sdk\Model\RenderedDocument', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\RenderedDocument', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

	/**
	 * Operation isReplacementPossible
	 *
	 * isReplacementPossible
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The invoice which should be checked if a replacement is possible. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return bool
	 */
	public function isReplacementPossible($spaceId, $id) {
		return $this->isReplacementPossibleWithHttpInfo($spaceId, $id)->getData();
	}

	/**
	 * Operation isReplacementPossibleWithHttpInfo
	 *
	 * isReplacementPossible
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The invoice which should be checked if a replacement is possible. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function isReplacementPossibleWithHttpInfo($spaceId, $id) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling isReplacementPossible');
		}
		// verify the required parameter 'id' is set
		if ($id === null) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling isReplacementPossible');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('*/*'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}
		if ($id !== null) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = "/transaction-invoice/isReplacementPossible";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'GET',
				$queryParams,
				$httpBody,
				$headerParams,
				'bool',
				'/transaction-invoice/isReplacementPossible'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), 'bool', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), 'bool', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

	/**
	 * Operation markAsDerecognized
	 *
	 * Mark as Derecognized
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoice which should be marked as derecognized. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return \Wallee\Sdk\Model\TransactionInvoice
	 */
	public function markAsDerecognized($spaceId, $id) {
		return $this->markAsDerecognizedWithHttpInfo($spaceId, $id)->getData();
	}

	/**
	 * Operation markAsDerecognizedWithHttpInfo
	 *
	 * Mark as Derecognized
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoice which should be marked as derecognized. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function markAsDerecognizedWithHttpInfo($spaceId, $id) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling markAsDerecognized');
		}
		// verify the required parameter 'id' is set
		if ($id === null) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling markAsDerecognized');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('application/json;charset=utf-8'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}
		if ($id !== null) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = "/transaction-invoice/markAsDerecognized";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\Wallee\Sdk\Model\TransactionInvoice',
				'/transaction-invoice/markAsDerecognized'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\Wallee\Sdk\Model\TransactionInvoice', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\TransactionInvoice', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

	/**
	 * Operation markAsPaid
	 *
	 * Mark as Paid
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoice which should be marked as paid. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return \Wallee\Sdk\Model\TransactionInvoice
	 */
	public function markAsPaid($spaceId, $id) {
		return $this->markAsPaidWithHttpInfo($spaceId, $id)->getData();
	}

	/**
	 * Operation markAsPaidWithHttpInfo
	 *
	 * Mark as Paid
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoice which should be marked as paid. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function markAsPaidWithHttpInfo($spaceId, $id) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling markAsPaid');
		}
		// verify the required parameter 'id' is set
		if ($id === null) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling markAsPaid');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('application/json;charset=utf-8'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}
		if ($id !== null) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = "/transaction-invoice/markAsPaid";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\Wallee\Sdk\Model\TransactionInvoice',
				'/transaction-invoice/markAsPaid'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\Wallee\Sdk\Model\TransactionInvoice', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\TransactionInvoice', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

	/**
	 * Operation read
	 *
	 * Read
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoices which should be returned. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return \Wallee\Sdk\Model\TransactionInvoice
	 */
	public function read($spaceId, $id) {
		return $this->readWithHttpInfo($spaceId, $id)->getData();
	}

	/**
	 * Operation readWithHttpInfo
	 *
	 * Read
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoices which should be returned. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function readWithHttpInfo($spaceId, $id) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling read');
		}
		// verify the required parameter 'id' is set
		if ($id === null) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling read');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('*/*'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}
		if ($id !== null) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = "/transaction-invoice/read";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'GET',
				$queryParams,
				$httpBody,
				$headerParams,
				'\Wallee\Sdk\Model\TransactionInvoice',
				'/transaction-invoice/read'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\Wallee\Sdk\Model\TransactionInvoice', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\TransactionInvoice', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

	/**
	 * Operation replace
	 *
	 * replace
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoices which should be replaced. (required)
	 * @param \Wallee\Sdk\Model\TransactionInvoiceReplacement $replacement  (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return \Wallee\Sdk\Model\TransactionInvoice
	 */
	public function replace($spaceId, $id, $replacement) {
		return $this->replaceWithHttpInfo($spaceId, $id, $replacement)->getData();
	}

	/**
	 * Operation replaceWithHttpInfo
	 *
	 * replace
	 *
	 * @param int $spaceId  (required)
	 * @param int $id The id of the transaction invoices which should be replaced. (required)
	 * @param \Wallee\Sdk\Model\TransactionInvoiceReplacement $replacement  (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function replaceWithHttpInfo($spaceId, $id, $replacement) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling replace');
		}
		// verify the required parameter 'id' is set
		if ($id === null) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling replace');
		}
		// verify the required parameter 'replacement' is set
		if ($replacement === null) {
			throw new \InvalidArgumentException('Missing the required parameter $replacement when calling replace');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('application/json;charset=utf-8'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}
		if ($id !== null) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = "/transaction-invoice/replace";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		// body params
		$tempBody = null;
		if (isset($replacement)) {
			$tempBody = $replacement;
		}

		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\Wallee\Sdk\Model\TransactionInvoice',
				'/transaction-invoice/replace'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\Wallee\Sdk\Model\TransactionInvoice', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\TransactionInvoice', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

	/**
	 * Operation search
	 *
	 * Search
	 *
	 * @param int $spaceId  (required)
	 * @param \Wallee\Sdk\Model\EntityQuery $query The query restricts the transaction invoices which are returned by the search. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return \Wallee\Sdk\Model\TransactionInvoice[]
	 */
	public function search($spaceId, $query) {
		return $this->searchWithHttpInfo($spaceId, $query)->getData();
	}

	/**
	 * Operation searchWithHttpInfo
	 *
	 * Search
	 *
	 * @param int $spaceId  (required)
	 * @param \Wallee\Sdk\Model\EntityQuery $query The query restricts the transaction invoices which are returned by the search. (required)
	 * @throws \Wallee\Sdk\ApiException
	 * @throws \Wallee\Sdk\VersioningException
	 * @throws \Wallee\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function searchWithHttpInfo($spaceId, $query) {
		// verify the required parameter 'spaceId' is set
		if ($spaceId === null) {
			throw new \InvalidArgumentException('Missing the required parameter $spaceId when calling search');
		}
		// verify the required parameter 'query' is set
		if ($query === null) {
			throw new \InvalidArgumentException('Missing the required parameter $query when calling search');
		}
		// header params
		$headerParams = array();
		$headerAccept = $this->apiClient->selectHeaderAccept(array('application/json;charset=utf-8'));
		if ($headerAccept !== null) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(array('application/json;charset=utf-8'));

		// query params
		$queryParams = array();
		if ($spaceId !== null) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($spaceId);
		}

		// path params
		$resourcePath = "/transaction-invoice/search";
		// default format to json
		$resourcePath = str_replace("{format}", "json", $resourcePath);

		// form params
		$formParams = array();
		// body params
		$tempBody = null;
		if (isset($query)) {
			$tempBody = $query;
		}

		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\Wallee\Sdk\Model\TransactionInvoice[]',
				'/transaction-invoice/search'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\Wallee\Sdk\Model\TransactionInvoice[]', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
				case 200:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\TransactionInvoice[]', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 442:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ClientError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
				case 542:
					$responseObject = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Wallee\Sdk\Model\ServerError', $e->getResponseHeaders());
					$e = new ApiException($e->getLogToken(), $responseObject->getMessage(), $e->getCode(), $e->getResponseHeaders(), $e->getResponseBody(), $responseObject);
					break;
			}

			throw $e;
		}
	}

}
