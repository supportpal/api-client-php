<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://www.supportpal.com/assets/img/logo_blue_small.png" /></a>
    <br>
    A client to interact with the <a href="https://api.supportpal.com/">SupportPal API</a> written in PHP.
</p>

<p align="center">
<a href="https://github.com/supportpal/api-client-php/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/supportpal/api-client-php"><img src="https://img.shields.io/packagist/dt/supportpal/api-client-php" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/supportpal/api-client-php"><img src="https://img.shields.io/packagist/v/supportpal/api-client-php" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/supportpal/api-client-php"><img src="https://img.shields.io/packagist/l/supportpal/api-client-php" alt="License"></a>
</p>

----

# Installation

```
composer require supportpal/api-client-php
```

# Usage

All supported [API end points](https://api.supportpal.com/) can be accessed through the `getApi` function.

```php
$baseApiUrl = 'www.example.com/api/';
$apiToken = 'token_api';  // To create an API token, see: https://docs.supportpal.com/current/API+Tokens

$supportPal = new \SupportPal\ApiClient\SupportPal($baseApiUrl, $apiToken);
$api = $supportPal->getApi();
```

## `GET` end points

```php
$coreSettings = $api->getCoreSettings();
``` 

## `POST` end points

To create a post request that requires sending data:

```php
$commentDataArray = [
    'text'         => 'text',
    'article_id'   => 3,
    'type_id'      => 1,
    'parent_id'    => 1,
    'status'       => 3,
    'notify_reply' => 0
];
$commentObject = new \SupportPal\ApiClient\Model\Comment;
$commentObject->fill($commentDataArray);
$savedComment = $api->postComment($commentObject);
```

## Unsupported end points

For API end points unsupported by this library, you can construct a generic request:

```php
$request = $supportPal
    ->getRequestFactory()
    ->create('PUT', 'selfservice/comment/1', [], ['text' => 'foo']);

$supportPal->sendRequest($request);
```
