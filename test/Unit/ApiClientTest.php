<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Factory\RequestFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

/**
 * @covers \SupportPal\ApiClient\ApiClient
 * Class ApiClientTest
 * @package SupportPal\ApiClient\Tests\Unit
 */
class ApiClientTest extends TestCase
{
    /**
     * @var array<mixed>
     */
    protected $genericErrorResponse = [
        'status' => 'error',
        'message' => null,
        'data' => []
    ];

    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    protected $httpClient;
    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    protected $requestFactory;
    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    protected $decoder;

    /**
     * @var string
     */
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
        $request = $this->prophesize(RequestInterface::class);
        /** @var Request $requestMock */
        $requestMock = $request->reveal();
        $this
            ->httpClient
            ->sendRequest($requestMock)
            ->shouldBeCalled()
            ->willThrow(ClientExceptionInterface::class)
            ->willReturn($this->prophesize(Response::class)->reveal());

        $this->expectException(HttpResponseException::class);
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
     * @param string|null $body
     * @return ObjectProphecy
     */
    protected function requestCommonExpectations(
        string $method,
        string $endpoint,
        array $parameters,
        ?string $body
    ): ObjectProphecy {
        $request = $this->prophesize(Request::class);
        if ('GET' === $method) {
            $create = $this->requestFactory->create($method, $endpoint, [], null, $parameters);
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
