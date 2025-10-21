<?php declare(strict_types=1);

use SupportPal\ApiClient\Http\Client;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Http\Request;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Http\UserClient;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure();

    $services->set(Client::class)
        ->public()
        ->arg('$httpClient', service(\GuzzleHttp\Client::class));

    $services->set(CoreClient::class)
        ->parent(Client::class);

    $services->set(SelfServiceClient::class)
        ->parent(Client::class);

    $services->set(TicketClient::class)
        ->parent(Client::class);

    $services->set(UserClient::class)
        ->parent(Client::class);

    $services->set(Request::class)
        ->public()
        ->arg('$apiUrl', '%apiUrl%')
        ->arg('$apiToken', '%apiToken%')
        ->arg('$contentType', '%apiContentType%')
        ->arg('$defaultBodyContent', '%defaultBodyContent%')
        ->arg('$defaultParameters', '%defaultParameters%');
};
