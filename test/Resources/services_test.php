<?php declare(strict_types=1);

use SupportPal\ApiClient\Http\Client;
use SupportPal\ApiClient\Http\Request;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/../../src/Resources/services.php');

    $parameters = $containerConfigurator->parameters();
    $parameters->set('apiUrl', 'localhost:8080/api/');
    $parameters->set('apiToken', 'test2');
    $parameters->set('apiContentType', 'test3');
    $parameters->set('defaultBodyContent', ['test' => 'test']);
    $parameters->set('defaultParameters', ['test' => 'test']);

    $services = $containerConfigurator->services();

    $services->defaults()
        ->autoconfigure()
        ->autowire()
        ->public();

    $services->set(Request::class)
        ->public()
        ->arg('$apiUrl', '%apiUrl%')
        ->arg('$apiToken', '%apiToken%')
        ->arg('$contentType', '%apiContentType%')
        ->arg('$defaultBodyContent', '%defaultBodyContent%')
        ->arg('$defaultParameters', '%defaultParameters%');

    $services->set(Client::class)
        ->public()
        ->arg('$httpClient', service(\GuzzleHttp\Client::class));
};
