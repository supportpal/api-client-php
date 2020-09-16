# SupportPal Client


A Client to interact with the SupportPal API written in PHP.

## Usage

This client exposes two main components with a set of Models.

### Initialize an instance
```php
use SupportPal\ApiClient\SupportPal;

$baseApiUrl = 'www.example.com/api/';
$apiToken = 'token_api'; #refer to documentation: https://docs.supportpal.com/current/API+Tokens
$supportPal = new SupportPal($baseApiUrl, $apiToken);
```

In order to access any supported resource, you need to use the Api component.
```php
$api = $supportPal->getApi();
$coreSettings = $api->getCoreSettings();
``` 

To create a post request that requires sending data:

```php
$api = $supportPal->getApi();
$commentDataArray = [
                        'text' => 'text',
                        'article_id' => 3,
                        'type_id' => 1,
                        'parent_id' => 1,
                        'status' => 3,
                        'notify_reply' => 0
                    ];
$commentObject = new \SupportPal\ApiClient\Model\Comment;
$commentObject->fill($commentDataArray);
$savedComment = $api->postComment($commentObject);
```

For unsupported APIs, you can send a generic request
```php
$commentDataArray = [
                        'text' => 'text',
                        'article_id' => 3,
                        'type_id' => 1,
                        'parent_id' => 1,
                        'status' => 3,
                        'notify_reply' => 0
                    ];
$request = $supportPal
    ->getRequestFactory()
    ->create('POST', 'selfservice/comment', [], $commentDataArray);

$supportPal->sendRequest($request);
```
