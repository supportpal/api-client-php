<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;

use function json_decode;
use function json_encode;

/**
 * Class ApiClientTest
 * @package SupportPal\ApiClient\Tests\Unit
 * @covers \SupportPal\ApiClient\ApiClient
 */
class ApiClientTest extends TestCase
{
    /** @var array<mixed> */
    protected $genericErrorResponse = [
        'status' => 'error',
        'message' => null,
        'data' => []
    ];

    /** @var ObjectProphecy */
    protected $httpClient;
    /** @var ObjectProphecy */
    protected $requestFactory;
    /** @var ApiClient */
    protected $apiClient;

    /** @var ObjectProphecy */
    protected $decoder;

    /** @var string */
    protected $formatType = 'json';

    protected function setUp(): void
    {
        parent::setUp();
        $this->httpClient = $this->prophesize(ClientInterface::class);
        $this->requestFactory = $this->prophesize(RequestFactory::class);
        $this->decoder = $this->prophesize(DecoderInterface::class);

        /** @var Client $httpClient */
        $httpClient = $this->httpClient->reveal();
        /** @var RequestFactory $requestFactory */
        $requestFactory = $this->requestFactory->reveal();
        /** @var DecoderInterface $decoder */
        $decoder = $this->decoder->reveal();
        $this->apiClient = new ApiClient(
            $httpClient,
            $requestFactory,
            $decoder,
            'json'
        );
    }

    public function testClientExceptionThrown(): void
    {
        $this->expectException(HttpResponseException::class);
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
        $this->expectException(HttpResponseException::class);
        $request = $this->prophesize(RequestInterface::class);
        $response = $this->prophesize(ResponseInterface::class);

        $this
            ->httpClient
            ->sendRequest($request->reveal())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $response->getBody()->willReturn('');

        $this->decoder
            ->decode('', $this->formatType)
            ->shouldBeCalled()
            ->willThrow(NotEncodableValueException::class);

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
     * @return ObjectProphecy
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
        } else {
            $create = $this->requestFactory->create($method, $endpoint, [], $body);
        }

        $create->shouldBeCalled()->willReturn($request->reveal());

        return $request;
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @param ObjectProphecy $request
     * @return ObjectProphecy
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
        $this
            ->decoder
            ->decode($responseBody, $this->formatType)
            ->shouldBeCalled()
            ->willReturn(json_decode($responseBody, true));

        return $response;
    }
}
