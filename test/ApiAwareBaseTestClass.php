<?php


namespace SupportPal\ApiClient\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use SupportPal\ApiClient\SupportPal;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ApiAwareBaseTestClass extends TestCase
{
    /**
     * @var SupportPal
     */
    private $supportPal;

    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     * @inheritDoc
     * @throws \ReflectionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        /**
         * create new app instance for functional tests
         */
        $this->supportPal = new SupportPal('', '');

        /**
         * create container for test environment
         */
        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('Resources/services_test.yml');
        $client = $this->prophesize(ClientInterface::class);
        $containerBuilder->set('GuzzleHttp\Client', $client->reveal());
        $containerBuilder->compile();

        /**
         * replace container with test container
         */
        $reflectionClass = new \ReflectionObject($this->supportPal);
        $property = $reflectionClass->getProperty('containerBuilder');
        $property->setAccessible(true);
        $property->setValue($this->supportPal, $containerBuilder);
        $property->setAccessible(false);

        $this->container = $containerBuilder;
    }

    /**
     * @return SupportPal
     */
    protected function getSupportPal(): SupportPal
    {
        return $this->supportPal;
    }

    /**
     * @return ContainerBuilder
     */
    protected function getContainer(): ContainerBuilder
    {
        return $this->container;
    }
}
