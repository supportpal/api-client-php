<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration;

use Exception;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
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

    protected function setUp(): void
    {
        parent::setUp();
        /** @var ApiClient $apiClient */
        $apiClient = $this->getContainer()->get(ApiClient::class);
        $this->apiClient = $apiClient;
    }

    public function testClientExceptionThrown(): void
    {
        $request = new Request('GET', 'test');

        $this->appendRequestException(
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        );

        $this->expectException(HttpResponseException::class);
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
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) $this->getEncoder()->encode($data, $this->getFormatType())
            )
        );

        /** @var callable $callable */
        $callable = [$this->apiClient, $functionName];
        $response = call_user_func_array($callable, $parameters);
        self::assertInstanceOf(Response::class, $response);
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
        /** @var callable $callable */
        $callable = [$this->apiClient, $endpoint];
        call_user_func_array($callable, $parameters);
    }

    /**
     * @return array<mixed>
     */
    protected function getGetEndpoints(): array
    {
        return [];
    }
}
