<?php
/**
 * AuthenticationApi
 * PHP version 8.1
 *
 * @package  kruegge82\DHLAuth
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * DHL Parcel Germany Account Authorization API
 *
 * This API describes how API client can obtain a token which is used to access various Parcel Germany APIs. Using this API is often the first step in making your API call. <p><h3>Preconditions</h3> You will need:  * client ID (aka \"API Key\", obtained when you create an app in developer.dhl.com) * client secret (obtained when you create an app in developer.dhl.com) * GKP user name (obtained when setting up your business account with Parcel Germany) * GKP password (obtained when setting up your business account with Parcel Germany)  <h3>Technical Information</h3> This uses an implementation of OAuth2 Password Grant (RFC 6749). After successfull usage you will:  * have an opaque access token to be used for API calls afterwards  * this token will have an expiration time
 *
 * The version of the OpenAPI document: 2.0.5
 * @generated Generated by: https://openapi-generator.tech
 * Generator version: 7.9.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace kruegge82\DHLAuth\Api;

use InvalidArgumentException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Promise\PromiseInterface;
use kruegge82\DHLAuth\ApiException;
use kruegge82\DHLAuth\Configuration;
use kruegge82\DHLAuth\HeaderSelector;
use kruegge82\DHLAuth\ObjectSerializer;

/**
 * AuthenticationApi Class Doc Comment
 *
 * @package  kruegge82\DHLAuth
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AuthenticationApi
{
    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var Configuration
     */
    protected Configuration $config;

    /**
     * @var HeaderSelector
     */
    protected HeaderSelector $headerSelector;

    /**
     * @var int Host index
     */
    protected int $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'dispenseToken' => [
            'application/x-www-form-urlencoded',
        ],
    ];

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null   $config
     * @param HeaderSelector|null  $selector
     * @param int                  $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex(int $hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex(): int
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Operation dispenseToken
     *
     * Obtains an access token based on the credentials submitted or based on the refresh token.
     *
     * @param  string $grant_type grant_type (required)
     * @param  string $username GKP user name. Required for grant_type&#x3D;password. (required)
     * @param  string $password GKP password. Required for grant_type&#x3D;password. (required)
     * @param  string $client_id client_id (required)
     * @param  string $client_secret client_secret (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['dispenseToken'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return \kruegge82\DHLAuth\Model\TokenResponse
     */
    public function dispenseToken(
        string $grant_type,
        string $username,
        string $password,
        string $client_id,
        string $client_secret,
        string $contentType = self::contentTypes['dispenseToken'][0]
    ): \kruegge82\DHLAuth\Model\TokenResponse
    {
        list($response) = $this->dispenseTokenWithHttpInfo($grant_type, $username, $password, $client_id, $client_secret, $contentType);
        return $response;
    }

    /**
     * Operation dispenseTokenWithHttpInfo
     *
     * Obtains an access token based on the credentials submitted or based on the refresh token.
     *
     * @param  string $grant_type (required)
     * @param  string $username GKP user name. Required for grant_type&#x3D;password. (required)
     * @param  string $password GKP password. Required for grant_type&#x3D;password. (required)
     * @param  string $client_id (required)
     * @param  string $client_secret (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['dispenseToken'] to see the possible values for this operation
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     * @throws InvalidArgumentException
     * @return array of \kruegge82\DHLAuth\Model\TokenResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function dispenseTokenWithHttpInfo(
        string $grant_type,
        string $username,
        string $password,
        string $client_id,
        string $client_secret,
        string $contentType = self::contentTypes['dispenseToken'][0]
    ): array
    {
        $request = $this->dispenseTokenRequest($grant_type, $username, $password, $client_id, $client_secret, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();


            switch($statusCode) {
                case 200:
                    if (in_array('\kruegge82\DHLAuth\Model\TokenResponse', ['\SplFileObject', '\Psr\Http\Message\StreamInterface'])) {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\kruegge82\DHLAuth\Model\TokenResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\kruegge82\DHLAuth\Model\TokenResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            $returnType = '\kruegge82\DHLAuth\Model\TokenResponse';
            if (in_array($returnType, ['\SplFileObject', '\Psr\Http\Message\StreamInterface'])) {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\kruegge82\DHLAuth\Model\TokenResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation dispenseTokenAsync
     *
     * Obtains an access token based on the credentials submitted or based on the refresh token.
     *
     * @param  string $grant_type (required)
     * @param  string $username GKP user name. Required for grant_type&#x3D;password. (required)
     * @param  string $password GKP password. Required for grant_type&#x3D;password. (required)
     * @param  string $client_id (required)
     * @param  string $client_secret (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['dispenseToken'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function dispenseTokenAsync(
        string $grant_type,
        string $username,
        string $password,
        string $client_id,
        string $client_secret,
        string $contentType = self::contentTypes['dispenseToken'][0]
    ): PromiseInterface
    {
        return $this->dispenseTokenAsyncWithHttpInfo($grant_type, $username, $password, $client_id, $client_secret, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation dispenseTokenAsyncWithHttpInfo
     *
     * Obtains an access token based on the credentials submitted or based on the refresh token.
     *
     * @param  string $grant_type (required)
     * @param  string $username GKP user name. Required for grant_type&#x3D;password. (required)
     * @param  string $password GKP password. Required for grant_type&#x3D;password. (required)
     * @param  string $client_id (required)
     * @param  string $client_secret (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['dispenseToken'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function dispenseTokenAsyncWithHttpInfo(
        $grant_type,
        $username,
        $password,
        $client_id,
        $client_secret,
        string $contentType = self::contentTypes['dispenseToken'][0]
    ): PromiseInterface
    {
        $returnType = '\kruegge82\DHLAuth\Model\TokenResponse';
        $request = $this->dispenseTokenRequest($grant_type, $username, $password, $client_id, $client_secret, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if (in_array($returnType, ['\SplFileObject', '\Psr\Http\Message\StreamInterface'])) {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'dispenseToken'
     *
     * @param  string $grant_type (required)
     * @param  string $username GKP user name. Required for grant_type&#x3D;password. (required)
     * @param  string $password GKP password. Required for grant_type&#x3D;password. (required)
     * @param  string $client_id (required)
     * @param  string $client_secret (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['dispenseToken'] to see the possible values for this operation
     *
     * @throws InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function dispenseTokenRequest(
        $grant_type,
        $username,
        $password,
        $client_id,
        $client_secret,
        string $contentType = self::contentTypes['dispenseToken'][0]
    ): Request
    {

        // verify the required parameter 'grant_type' is set
        if ($grant_type === null || (is_array($grant_type) && count($grant_type) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $grant_type when calling dispenseToken'
            );
        }

        // verify the required parameter 'username' is set
        if ($username === null || (is_array($username) && count($username) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $username when calling dispenseToken'
            );
        }

        // verify the required parameter 'password' is set
        if ($password === null || (is_array($password) && count($password) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $password when calling dispenseToken'
            );
        }

        // verify the required parameter 'client_id' is set
        if ($client_id === null || (is_array($client_id) && count($client_id) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $client_id when calling dispenseToken'
            );
        }

        // verify the required parameter 'client_secret' is set
        if ($client_secret === null || (is_array($client_secret) && count($client_secret) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $client_secret when calling dispenseToken'
            );
        }


        $resourcePath = '/token';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;




        // form params
        if ($grant_type !== null) {
            $formParams['grant_type'] = ObjectSerializer::toFormValue($grant_type);
        }
        // form params
        if ($username !== null) {
            $formParams['username'] = ObjectSerializer::toFormValue($username);
        }
        // form params
        if ($password !== null) {
            $formParams['password'] = ObjectSerializer::toFormValue($password);
        }
        // form params
        if ($client_id !== null) {
            $formParams['client_id'] = ObjectSerializer::toFormValue($client_id);
        }
        // form params
        if ($client_secret !== null) {
            $formParams['client_secret'] = ObjectSerializer::toFormValue($client_secret);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires Bearer (Apigee) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
