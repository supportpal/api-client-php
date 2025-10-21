<?php declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/api.php');
    $containerConfigurator->import(__DIR__ . '/client.php');

    $parameters = $containerConfigurator->parameters();
    $parameters->set('apiContentType', 'application/json');
    $parameters->set('contentType', 'json');

    $services = $containerConfigurator->services();
    $services->defaults()
        ->autowire()
        ->autoconfigure();
};
