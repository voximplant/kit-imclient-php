# VoximplantKitIM
<h1>Basic description</h1>  <p>HTTP API is available via the <u>https://kit-im-{{region}}.voximplant.com/<b>{method}</b></u> endpoint. To send events you need to use jwt token. You can get jwt token via login method using an api token created on api tokens page. You need to pass api token as access_token.</p>  <h1>Authentication</h1>   <p>The parameters that are needed to be sent for generate jwt token are as follows:</p> <ul>   <li><strong>access_token</strong></li>   <li><strong>domain</strong></li> </ul>

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/voximplant/kit-imclient-php.git"
    }
  ],
  "require": {
    "voximplant/kit-imclient-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/VoximplantKitIM/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = VoximplantKitIM\Configuration::getDefaultConfiguration();
$config->setHost('https://kit-im-{{region}}.voximplant.com');

// Configure API key authorization: access_token
$config->setApiKey('access_token', 'your_access_token');
// Configure API key authorization: domain
$config->setApiKey('domain', 'your_domain');

$kitApi = new VoximplantKitIM\VoximplantKitIMClient($config);

$channel_uuid = "channel_uuid_example"; // string | 

try {
    $result = $kitApi->BotServiceApi->login($channel_uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $kitApi->BotServiceApi->login: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://kit-im-{{region}}.voximplant.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*BotServiceApi* | [**login**](docs/Api/BotServiceApi.md#login) | **POST** /api/v3/botService/login | 
*BotServiceApi* | [**refreshToken**](docs/Api/BotServiceApi.md#refreshtoken) | **POST** /api/v3/botService/refreshToken | 
*BotServiceApi* | [**sendEvent**](docs/Api/BotServiceApi.md#sendevent) | **POST** /{channel_uuid} | 


## Documentation For Models

 - [AnyOfMessagingEventMessageTypePayloadItems](docs/Model/AnyOfMessagingEventMessageTypePayloadItems.md)
 - [Body](docs/Model/Body.md)
 - [Body1](docs/Model/Body1.md)
 - [ErrorResultType](docs/Model/ErrorResultType.md)
 - [ErrorType](docs/Model/ErrorType.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [MessagingEventMessagePayloadContact](docs/Model/MessagingEventMessagePayloadContact.md)
 - [MessagingEventMessagePayloadLocation](docs/Model/MessagingEventMessagePayloadLocation.md)
 - [MessagingEventMessagePayloadMedia](docs/Model/MessagingEventMessagePayloadMedia.md)
 - [MessagingEventMessageSenderDataType](docs/Model/MessagingEventMessageSenderDataType.md)
 - [MessagingEventMessageType](docs/Model/MessagingEventMessageType.md)
 - [MessagingIncomingEventClientDataDeviceType](docs/Model/MessagingIncomingEventClientDataDeviceType.md)
 - [MessagingIncomingEventClientDataLocationType](docs/Model/MessagingIncomingEventClientDataLocationType.md)
 - [MessagingIncomingEventClientDataPageType](docs/Model/MessagingIncomingEventClientDataPageType.md)
 - [MessagingIncomingEventClientDataUtmType](docs/Model/MessagingIncomingEventClientDataUtmType.md)
 - [MessagingIncomingEventType](docs/Model/MessagingIncomingEventType.md)
 - [MessagingIncomingEventTypeClientData](docs/Model/MessagingIncomingEventTypeClientData.md)
 - [MessagingIncomingEventTypeEventData](docs/Model/MessagingIncomingEventTypeEventData.md)
 - [MessagingLoginResponseType](docs/Model/MessagingLoginResponseType.md)
 - [MessagingLoginResponseTypeResult](docs/Model/MessagingLoginResponseTypeResult.md)
 - [MessagingOutgoingChatCloseEventSenderDataType](docs/Model/MessagingOutgoingChatCloseEventSenderDataType.md)
 - [MessagingOutgoingChatCloseEventType](docs/Model/MessagingOutgoingChatCloseEventType.md)
 - [MessagingOutgoingChatCloseEventTypeEventData](docs/Model/MessagingOutgoingChatCloseEventTypeEventData.md)
 - [MessagingOutgoingNewMessageEventType](docs/Model/MessagingOutgoingNewMessageEventType.md)
 - [MessagingOutgoingNewMessageEventTypeClientData](docs/Model/MessagingOutgoingNewMessageEventTypeClientData.md)
 - [MessagingOutgoingNewMessageEventTypeEventData](docs/Model/MessagingOutgoingNewMessageEventTypeEventData.md)


## Documentation For Authorization

 Authentication schemes defined for the API:
## access_token
- **Type**: API key
- **API key parameter name**: access_token
- **Location**: URL query string

## domain
- **Type**: API key
- **API key parameter name**: domain
- **Location**: URL query string

## jwt_token
- **Location**: HTTP header
- **Header key parameter name**: Authorization


## Author




