<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\SupportPal;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

abstract class ApiAwareBaseTestClass extends TestCase
{
    use StringHelper;

    /**
     * @var SupportPal
     */
    private $supportPal;

    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     * @var MockHandler
     */
    private $mockRequestHandler;

    /**
     * @inheritDoc
     * @throws \ReflectionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        /**
         * create new app instance for tests
         */
        $this->supportPal = new SupportPal('', '');

        /**
         * create container for test environment
         */
        $containerBuilder = new ContainerBuilder;
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
        $loader->load('Resources/services_test.yml');

        /**
         * replace GuzzleClient with MockClient
         */
        $this->mockRequestHandler = new MockHandler;
        $handlerStack = HandlerStack::create($this->mockRequestHandler);
        $client = new Client(['handler' => $handlerStack]);
        $containerBuilder->set('GuzzleHttp\Client', $client);
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

    protected function appendRequestResponse(Response $response): void
    {
        $this->mockRequestHandler->reset();
        $this->mockRequestHandler->append($response);
    }
}
