<?php


namespace SupportPal\ApiClient;

use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class SupportPal
{

    /**
     * @var ContainerBuilder
     */
    private $containerBuilder;

    public function __construct(string $apiUrl, string $apiToken)
    {
        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('resources/services.yml');
        $containerBuilder->setParameter('apiUrl', $apiUrl);
        $containerBuilder->setParameter('apiToken', $apiToken);
        $containerBuilder->compile();

        $this->containerBuilder = $containerBuilder;
    }

    /**
     * This method returns the api for supportpal system
     * @return Api
     * @throws \Exception
     */
    public function getApi(): Api
    {
        /** @var Api $api */
        $api = $this->containerBuilder->get(Api::class);
        return $api;
    }

    /**
     * This method returns the factory for SupportPal models
     * @return ModelCollectionFactory
     * @throws \Exception
     */
    public function getCollectionFactories(): ModelCollectionFactory
    {
        /** @var ModelCollectionFactory $modelCollectionFactory */
        $modelCollectionFactory = $this->containerBuilder->get(ModelCollectionFactory::class);
        return $modelCollectionFactory;
    }
}
