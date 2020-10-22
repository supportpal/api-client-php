<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Client\RequestExceptionInterface;
use ReflectionException;
use ReflectionObject;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\SupportPal;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

use function json_encode;

/**
 * Class ContainerAwareBaseTestCase
 * @package SupportPal\ApiClient\Tests
 * @coversNothing
 */
abstract class ContainerAwareBaseTestCase extends TestCase
{
    /** @var array<mixed> */
    protected $genericErrorResponse = [
        'status' => 'error',
        'message' => 'unsuccessful error',
        'data' => []
    ];

    /** @var SupportPal */
    protected $supportPal;

    /** @var ContainerBuilder */
    private $container;

    /** @var MockHandler */
    protected $mockRequestHandler;

    /**
     * @return iterable<array<string, Response>>
     */
    public function provideUnsuccessfulTestCases(): iterable
    {
        $jsonSuccessfulBody = $this->genericErrorResponse;
        $jsonSuccessfulBody['status'] = 'success';
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($jsonSuccessfulBody);

        yield ['error 400 response' => new Response(400, [], $jsonSuccessfulBody)];
        yield ['error 401 response' => new Response(401, [], $jsonSuccessfulBody)];
        yield ['error 403 response' => new Response(403, [], $jsonSuccessfulBody)];
        yield ['error 404 response' => new Response(404, [], $jsonSuccessfulBody)];

        /** @var string $jsonErrorBody */
        $jsonErrorBody = json_encode($this->genericErrorResponse);

        yield [
            'error status response' => new Response(200, [], $jsonErrorBody)
        ];
    }

    /**
     * @inheritDoc
     * @throws ReflectionException
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
        $client = $this->getGuzzleClient();
        $containerBuilder->set('GuzzleHttp\Client', $client);
        $containerBuilder->compile();

        /**
         * replace container with test container
         */
        $reflectionClass = new ReflectionObject($this->supportPal);
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

    /**
     * @return EncoderInterface
     * @throws Exception
     */
    protected function getEncoder(): EncoderInterface
    {
        /** @var EncoderInterface $encoder */
        $encoder = $this->container->get(JsonEncoder::class);

        return $encoder;
    }

    /**
     * @return DecoderInterface
     * @throws Exception
     */
    protected function getDecoder(): DecoderInterface
    {
        /** @var DecoderInterface $decoder */
        $decoder = $this->container->get(JsonEncoder::class);

        return $decoder;
    }

    /**
     * @return string
     */
    protected function getFormatType(): string
    {
        return $this->container->getParameter('contentType');
    }

    /**
     * @param Response $response
     */
    protected function appendRequestResponse(Response $response): void
    {
        $this->mockRequestHandler->reset();
        $this->mockRequestHandler->append($response);
    }

    /**
     * @param RequestExceptionInterface $requestException
     */
    protected function appendRequestException(RequestExceptionInterface $requestException): void
    {
        $this->mockRequestHandler->reset();
        $this->mockRequestHandler->append($requestException);
    }

    /**
     * @param Response $response
     * @throws Exception
     */
    protected function prepareUnsuccessfulApiRequest(Response $response): void
    {
        $this->appendRequestResponse($response);
        self::expectException(HttpResponseException::class);
        self::expectExceptionMessage(
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['message']
        );
    }

    /**
     * @return Client
     */
    protected function getGuzzleClient(): Client
    {
        /**
         * replace GuzzleClient with MockClient
         */
        $this->mockRequestHandler = new MockHandler;
        $handlerStack = HandlerStack::create($this->mockRequestHandler);

        return new Client(['handler' => $handlerStack]);
    }
}
