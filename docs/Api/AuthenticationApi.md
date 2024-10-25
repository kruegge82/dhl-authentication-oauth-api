# kruegge82\DHLAuth\AuthenticationApi

All URIs are relative to https://api-sandbox.dhl.com/parcel/de/account/auth/ropc/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**dispenseToken()**](AuthenticationApi.md#dispenseToken) | **POST** /token | Obtains an access token based on the credentials submitted or based on the refresh token. |


## `dispenseToken()`

```php
dispenseToken($grant_type, $username, $password, $client_id, $client_secret): \kruegge82\DHLAuth\Model\TokenResponse
```

Obtains an access token based on the credentials submitted or based on the refresh token.

The client makes a request to the token endpoint by adding the following parameters  using the application/x-www-form-urlencoded format with a character encoding of UTF-8 in the HTTP request entity-body:  * grant_type __REQUIRED__. Must be set to \"password\".  * client_id __REQUIRED__ (aka client_id (api key))  * client_secret __REQUIRED__ (aka client_secret)  * username __REQUIRED__. The resource owner username. Aka username for business customer portal  * password __REQUIRED__. The resource owner password. Aka password for business customer portal  __Notes__  * Returns an opaque access token. Use this as BearerToken where required. * Example values can be used as-is to try out with the sandbox.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (Apigee) authorization: bearerAuth
$config = kruegge82\DHLAuth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new kruegge82\DHLAuth\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grant_type = 'grant_type_example'; // string
$username = 'username_example'; // string | GKP user name. Required for grant_type=password.
$password = 'password_example'; // string | GKP password. Required for grant_type=password.
$client_id = 'client_id_example'; // string
$client_secret = 'client_secret_example'; // string

try {
    $result = $apiInstance->dispenseToken($grant_type, $username, $password, $client_id, $client_secret);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->dispenseToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grant_type** | **string**|  | |
| **username** | **string**| GKP user name. Required for grant_type&#x3D;password. | |
| **password** | **string**| GKP password. Required for grant_type&#x3D;password. | |
| **client_id** | **string**|  | |
| **client_secret** | **string**|  | |

### Return type

[**\kruegge82\DHLAuth\Model\TokenResponse**](../Model/TokenResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
