<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\RequestExceptionInterface;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\SupportPal;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

abstract class ContainerAwareBaseTestCase extends TestCase
{
    use StringHelper;

    /**
     * @var array<mixed>
     */
    protected $genericErrorResponse = [
        'status' => 'error',
        'message' => 'unsuccessful error',
        'data' => []
    ];

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
     * @return iterable<array<string, Response>>
     */
    public function provideUnsuccessfulTestCases(): iterable
    {
        $this->setUp();
        $jsonErrorBody = $this->genericErrorResponse;
        $jsonErrorBody['status'] = 'success';
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($jsonErrorBody, $this->getFormatType());

        yield ['error 400 response' => new Response(400, [], $jsonSuccessfulBody)];
        yield ['error 401 response' => new Response(401, [], $jsonSuccessfulBody)];
        yield ['error 403 response' => new Response(403, [], $jsonSuccessfulBody)];
        yield ['error 404 response' => new Response(404, [], $jsonSuccessfulBody)];

        /** @var string $jsonErrorBody */
        $jsonErrorBody = $this->getEncoder()->encode($this->genericErrorResponse, $this->getFormatType());

        yield [
            'error status response' => new Response(200, [], $jsonErrorBody)
        ];
    }

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

    /**
     * @return EncoderInterface
     * @throws \Exception
     */
    protected function getEncoder(): EncoderInterface
    {
        /** @var EncoderInterface $encoder */
        $encoder = $this->container->get(JsonEncoder::class);

        return $encoder;
    }

    /**
     * @return DecoderInterface
     * @throws \Exception
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
     * @param object $obj
     * @param array<mixed> $array
     */
    protected function assertArrayEqualsObjectFields(object $obj, array $array): void
    {
        foreach ($array as $key => $value) {
            if (! is_array($value)) {
                self::assertSame($value, $obj->{'get'.$this->snakeCaseToPascalCase($key)}());
            } else {
                $this->assertArrayEqualsObjectFields($obj->{'get'.$this->snakeCaseToPascalCase($key)}(), $value);
            }
        }
    }
}
