<?php declare(strict_types=1);

use SupportPal\ApiClient\Api\Api;
use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Api\UserApi;
use SupportPal\ApiClient\Http\CoreClient;
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

    $services->set(Api::class)
        ->private();

    $services->set(CoreApi::class)
        ->public()
        ->parent(Api::class)
        ->arg('$apiClient', service(CoreClient::class));

    $services->set(SelfServiceApi::class)
        ->public()
        ->parent(Api::class)
        ->arg('$apiClient', service(SelfServiceClient::class));

    $services->set(TicketApi::class)
        ->public()
        ->parent(Api::class)
        ->arg('$apiClient', service(TicketClient::class));

    $services->set(UserApi::class)
        ->public()
        ->parent(Api::class)
        ->arg('$apiClient', service(UserClient::class));
};
