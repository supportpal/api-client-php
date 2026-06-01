<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration;

use Exception;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use JsonException;
use PHPUnit\Framework\Attributes\DataProvider;
use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\Client;
use SupportPal\ApiClient\Tests\ApiDataProviders;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

use function call_user_func_array;
use function json_decode;
use function json_encode;

class ApiClientTestCase extends ContainerAwareBaseTestCase
{
    use ApiDataProviders;

    /** @var Client */
    protected $apiClient;

    /**
     * used in put endpoints, any int (id) works
     */
    private const TEST_ID = 1;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var Client $apiClient */
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
     * @param array<mixed> $data
     * @param array<mixed> $parameters
     * @throws Exception
     */
    #[DataProvider('provideGetEndpointsTestCases')]
    public function testGetEndpoints(array $data, string $functionName, array $parameters): void
    {
        $expectedResponse = new Response(
            200,
            [],
            (string) json_encode($data)
        );
        $this->appendRequestResponse($expectedResponse);
        $response = $this->makeClientCall($functionName, $parameters);
        self::assertSame($expectedResponse, $response);
        self::assertSame($data, json_decode((string) $response->getBody(), true));
    }

    /**
     * @param Response $response
     * @param string $endpoint
     * @param array<mixed> $parameters
     * @throws Exception
     */
    #[DataProvider('provideGetEndpointsUnsuccessfulTestCases')]
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint, array $parameters): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->makeClientCall($endpoint, $parameters);
    }

    /**
     * @param array<mixed>|null $modelData
     * @param array<mixed>|null $responseData
     * @param string|null $endpoint
     * @throws Exception
     */
    #[DataProvider('providePostEndpointsTestCases')]
    public function testPostModel(?array $modelData, ?array $responseData, ?string $endpoint): void
    {
        if ($modelData === null || $responseData === null || $endpoint === null) {
            $this->markTestSkipped('No POST endpoints available for this API.');
        }

        $jsonSuccessfulBody = json_encode($responseData) ?: throw new JsonException('Failed to encode JSON data.');
        $expectedResponse = new Response(200, [], $jsonSuccessfulBody);
        $this->appendRequestResponse($expectedResponse);
        $response = $this->makeClientCall($endpoint, [$modelData]);
        self::assertSame($expectedResponse, $response);
        self::assertSame(
            $responseData,
            json_decode((string) $response->getBody(), true)
        );
    }

    /**
     * @param Response|null $response
     * @param string|null $endpoint
     * @param array<mixed>|null $data
     * @throws Exception
     */
    #[DataProvider('providePostEndpointsUnsuccessfulTestCases')]
    public function testUnsuccessfulPostModel(?Response $response, ?string $endpoint, ?array $data): void
    {
        if ($response === null || $endpoint === null || $data === null) {
            $this->markTestSkipped('No POST endpoints available for this API.');
        }

        $this->prepareUnsuccessfulApiRequest($response);
        $this->makeClientCall($endpoint, [$data]);
    }

    /**
     * @param array<mixed>|null $modelData
     * @param array<mixed>|null $responseData
     * @param string|null $endpoint
     * @throws Exception
     */
    #[DataProvider('provideApiClientPutEndpointsTestCases')]
    public function testPutModel(?array $modelData, ?array $responseData, ?string $endpoint): void
    {
        if ($modelData === null || $responseData === null || $endpoint === null) {
            $this->markTestSkipped('No PUT endpoints available for this API.');
        }

        $jsonSuccessfulBody = json_encode($responseData) ?: throw new JsonException('Failed to encode JSON data.');
        $expectedResponse = new Response(200, [], $jsonSuccessfulBody);
        $this->appendRequestResponse($expectedResponse);
        $response = $this->makeClientCall($endpoint, [self::TEST_ID, $modelData]);
        self::assertSame($expectedResponse, $response);
        self::assertSame(
            $responseData,
            json_decode((string) $response->getBody(), true)
        );
    }

    /**
     * @param Response|null $response
     * @param string|null $endpoint
     * @param array<mixed>|null $data
     * @throws Exception
     */
    #[DataProvider('providePutEndpointsUnsuccessfulTestCases')]
    public function testUnsuccessfulPutModel(?Response $response, ?string $endpoint, ?array $data): void
    {
        if ($response === null || $endpoint === null || $data === null) {
            $this->markTestSkipped('No PUT endpoints available for this API.');
        }

        $this->prepareUnsuccessfulApiRequest($response);
        $this->makeClientCall($endpoint, [self::TEST_ID, $data]);
    }

    #[DataProvider('provideDownloadEndpointsTestCases')]
    public function testDownloadEndpoint(?int $modelId, ?string $endpoint): void
    {
        if ($modelId === null || $endpoint === null) {
            $this->markTestSkipped('No download endpoints available for this API.');
        }

        $expectedResponse = new Response(200, ['Content-Disposition' => 'test'], '');
        $this->appendRequestResponse($expectedResponse);
        $response = $this->makeClientCall($endpoint, [$modelId]);
        self::assertSame($expectedResponse, $response);
    }

    /**
     * @return array<mixed>
     */
    protected static function getGetEndpoints(): array
    {
        return [];
    }

    /**
     * @return array<mixed>
     */
    protected static function getPostEndpoints(): array
    {
        return [];
    }

    /**
     * @return array<mixed>
     */
    protected static function getPutEndpoints(): array
    {
        return [];
    }

    /**
     * @return array<mixed>
     */
    protected static function getDeleteEndpoints(): array
    {
        return [];
    }

    /**
     * @return array<mixed>
     */
    protected static function getDownloadsEndpoints(): array
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
        return Client::class;
    }
}
