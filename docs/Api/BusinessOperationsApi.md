# kruegge82\DHLAuth\BusinessOperationsApi

All URIs are relative to https://api-sandbox.dhl.com/parcel/de/account/auth/ropc/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**hello()**](BusinessOperationsApi.md#hello) | **GET** /hello | This allows testing of the token and also alternative authentication methods. |


## `hello()`

```php
hello(): \kruegge82\DHLAuth\Model\TokenResponse
```

This allows testing of the token and also alternative authentication methods.

Makes a request to a test resource. Both old-style (apikey + basic auth) and token-based authentication are supported.  <p><h3>Usage</h3>  <h4>Bearer Token</h4>  Provide the token which you have obtained above in the HTTP header 'Authorization' as 'Bearer HereGoesMyToken'. On success, some information on the token is returned.   <h4> Basic Auth </h4>  Alternatively, the test resource can be used by providing:  <p>  * the API Key (client_id) in the HTTP header 'dhl-api-key'  * gkp user and gkp password in the HTTP header 'Authorization' with schema 'Basic'. For test purposes, use 'gkpuser' as username and 'gkppass' as password.  <p> Using different combinations of credentials will result in errors.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (Apigee) authorization: bearerAuth
$config = kruegge82\DHLAuth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new kruegge82\DHLAuth\Api\BusinessOperationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->hello();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BusinessOperationsApi->hello: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\kruegge82\DHLAuth\Model\TokenResponse**](../Model/TokenResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
