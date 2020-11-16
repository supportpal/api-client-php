<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration;

use Exception;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\ApiDataProviders;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

use function call_user_func_array;

/**
 * Class ApiClientTest
 * @package SupportPal\ApiClient\Tests\Integration
 */
class ApiClientTest extends ContainerAwareBaseTestCase
{
    use ApiDataProviders;

    /** @var ApiClient */
    protected $apiClient;

    /**
     * used in put endpoints, any int (id) works
     */
    private const TEST_ID = 1;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var ApiClient $apiClient */
        $apiClient = $this->getContainer()->get($this->getApiClientClass());
        $this->apiClient = $apiClient;
    }

    public function testClientExceptionThrown(): void
    {
        $request = new Request('GET', 'test');

        $this->appendRequestException(
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        );

        self::expectException(HttpResponseException::class);
        $this->apiClient->sendRequest($request);
    }

    public function testResponseNonEncodeableException(): void
    {
        $request = new Request('GET', 'test');
        $this->appendRequestResponse(new Response(404, [], ''));

        self::expectException(HttpResponseException::class);
        self::expectExceptionMessage('Not Found');
        $this->apiClient->sendRequest($request);
    }

    /**
     * @dataProvider provideGetEndpointsTestCases
     * @param array<mixed> $data
     * @param string $functionName
     * @param array<mixed> $parameters
     * @throws Exception
     */
    public function testGetEndpoints(array $data, string $functionName, array $parameters): void
    {
        $expectedResponse = new Response(
            200,
            [],
            (string) $this->getEncoder()->encode($data, $this->getFormatType())
        );
        $this->appendRequestResponse($expectedResponse);
        $response = $this->makeClientCall($functionName, $parameters);
        self::assertSame($expectedResponse, $response);
        self::assertSame($data, $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType()));
    }

    /**
     * @param Response $response
     * @param string $endpoint
     * @param array<mixed> $parameters
     * @throws Exception
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->makeClientCall($endpoint, $parameters);
    }

    /**
     * @dataProvider providePostEndpointsTestCases
     * @param array<mixed> $modelData
     * @param array<mixed> $responseData
     * @param string $endpoint
     * @throws Exception
     */
    public function testPostModel(array $modelData, array $responseData, string $endpoint): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($responseData, $this->getFormatType());
        $expectedResponse = new Response(200, [], $jsonSuccessfulBody);
        $this->appendRequestResponse($expectedResponse);
        $response = $this->makeClientCall($endpoint, [$modelData]);
        self::assertSame($expectedResponse, $response);
        self::assertSame(
            $responseData,
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())
        );
    }

    /**
     * @param Response $response
     * @param string $endpoint
     * @param array<mixed> $data
     * @throws Exception
     * @dataProvider providePostEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulPostModel(Response $response, string $endpoint, array $data): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->makeClientCall($endpoint, [$data]);
    }

    /**
     * @dataProvider provideApiClientPutEndpointsTestCases
     * @param array<mixed> $modelData
     * @param array<mixed> $responseData
     * @param string $endpoint
     * @throws Exception
     */
    public function testPutModel(array $modelData, array $responseData, string $endpoint): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = $this->getEncoder()->encode($responseData, $this->getFormatType());
        $expectedResponse = new Response(200, [], $jsonSuccessfulBody);
        $this->appendRequestResponse($expectedResponse);
        $response = $this->makeClientCall($endpoint, [self::TEST_ID, $modelData]);
        self::assertSame($expectedResponse, $response);
        self::assertSame(
            $responseData,
            $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())
        );
    }

    /**
     * @param Response $response
     * @param string $endpoint
     * @param array<mixed> $data
     * @throws Exception
     * @dataProvider providePutEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulPutModel(Response $response, string $endpoint, array $data): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->makeClientCall($endpoint, [self::TEST_ID, $data]);
    }

    /**
     * @param int $modelId
     * @param string $endpoint
     * @dataProvider provideDownloadEndpointsTestCases
     */
    public function testDownloadEndpoint(int $modelId, string $endpoint): void
    {
        $expectedResponse = new Response(200, ['Content-Disposition' => 'test'], '');
        $this->appendRequestResponse($expectedResponse);
        $response = $this->makeClientCall($endpoint, [$modelId]);
        self::assertSame($expectedResponse, $response);
    }

    /**
     * @return array<mixed>
     */
    protected function getGetEndpoints(): array
    {
        return [];
    }

    /**
     * @return array<mixed>
     */
    protected function getPostEndpoints(): array
    {
        return [];
    }

    /**
     * @return array<mixed>
     */
    protected function getPutEndpoints(): array
    {
        return [];
    }

    /**
     * @return array<mixed>
     */
    protected function getDownloadsEndpoints(): array
    {
        return [];
    }

    /**
     * @param string $endpoint
     * @param array<mixed> $parameters
     * @return ResponseInterface
     */
    protected function makeClientCall(string $endpoint, array $parameters): ResponseInterface
    {
        /** @var callable $callable */
        $callable = [$this->apiClient, $endpoint];

        return call_user_func_array($callable, $parameters);
    }

    /**
     * @return class-string
     */
    protected function getApiClientClass()
    {
        return ApiClient::class;
    }
}
