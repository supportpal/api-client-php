<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;
use SupportPal\ApiClient\Tests\PhpUnit\PhpUnitCompatibilityTrait;

use function json_encode;

/**
 * Class ApiClientTest
 * @package SupportPal\ApiClient\Tests\Unit
 * @covers \SupportPal\ApiClient\ApiClient
 */
class ApiClientTest extends TestCase
{
    use PhpUnitCompatibilityTrait;

    /** @var array<mixed> */
    protected $genericErrorResponse = [
        'status' => 'error',
        'message' => null,
        'data' => []
    ];

    /** @var ObjectProphecy|ClientInterface */
    protected $httpClient;

    /** @var ObjectProphecy|RequestFactory */
    protected $requestFactory;

    /** @var ApiClient */
    protected $apiClient;

    protected function setUp(): void
    {
        parent::setUp();
        $this->httpClient = $this->prophesize(ClientInterface::class);
        $this->requestFactory = $this->prophesize(RequestFactory::class);

        /** @var Client $httpClient */
        $httpClient = $this->httpClient->reveal();
        /** @var RequestFactory $requestFactory */
        $requestFactory = $this->requestFactory->reveal();

        $apiClassName = $this->getApiClientName();

        $this->apiClient = new $apiClassName(
            $httpClient,
            $requestFactory,
        );
    }

    public function testClientExceptionThrown(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->prophesize(RequestInterface::class);
        $this
            ->httpClient
            ->sendRequest($request->reveal())
            ->willThrow(ClientException::class)
            ->shouldBeCalled();

        /** @var RequestInterface $requestMock */
        $requestMock = $request->reveal();
        $this->apiClient->sendRequest($requestMock);
    }

    public function testResponseNonEncodeableException(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->prophesize(RequestInterface::class);
        $response = $this->prophesize(ResponseInterface::class);
        $response->getReasonPhrase()->shouldBeCalled()->willReturn('');

        $this
            ->httpClient
            ->sendRequest($request->reveal())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $response->getBody()->willReturn('');

        /** @var RequestInterface $requestMock */
        $requestMock = $request->reveal();
        $this->apiClient->sendRequest($requestMock);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideUnsuccessfulTestCases(): iterable
    {
        $jsonErrorBody = $this->genericErrorResponse;
        $jsonErrorBody['status'] = 'success';
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode($jsonErrorBody);

        yield ['error 400 response' => 400, $jsonSuccessfulBody];
        yield ['error 401 response' => 401, $jsonSuccessfulBody];
        yield ['error 403 response' => 403, $jsonSuccessfulBody];
        yield ['error 404 response' => 404, $jsonSuccessfulBody];

        /** @var string $jsonErrorBody */
        $jsonErrorBody = json_encode($this->genericErrorResponse);

        yield [
            'error status response' => 200, $jsonErrorBody,
        ];
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array<mixed> $parameters
     * @param array<mixed> $body
     * @return ObjectProphecy|Request
     */
    protected function requestCommonExpectations(
        string $method,
        string $endpoint,
        array $parameters,
        array $body = []
    ): ObjectProphecy {
        $request = $this->prophesize(Request::class);
        if ($method === 'GET') {
            $create = $this->requestFactory->create($method, $endpoint, [], [], $parameters);
            $create->shouldBeCalled()->willReturn($request->reveal());
        }

        if ($method !== 'GET') {
            $create = $this->requestFactory->create($method, $endpoint, [], $body);
            $create->shouldBeCalled()->willReturn($request->reveal());
        }

        return $request;
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @param ObjectProphecy|Request $request
     * @return ObjectProphecy|ResponseInterface
     */
    protected function sendRequestCommonExpectations(
        int $statusCode,
        string $responseBody,
        ObjectProphecy $request
    ): ObjectProphecy {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()->willReturn($statusCode);
        $response->getBody()->willReturn($responseBody);
        $this->httpClient->sendRequest($request->reveal())->shouldBeCalled()->willReturn($response->reveal());

        return $response;
    }

    /**
     * @param ObjectProphecy|Request $request
     */
    protected function throwClientExceptionCommonExpectations(ObjectProphecy $request): void
    {
        /** @var ObjectProphecy|Exception $clientExceptionInterface */
        $clientExceptionInterface = $this->prophesize(ClientExceptionInterface::class);
        $this->httpClient
            ->sendRequest($request->reveal())
            ->willThrow($clientExceptionInterface->reveal())
            ->shouldBeCalled();
    }

    /**
     * @return class-string<ApiClient>
     */
    protected function getApiClientName(): string
    {
        return ApiClient::class;
    }
}
