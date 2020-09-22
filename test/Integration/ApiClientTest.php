<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\ApiTestCase;

class ApiClientTest extends ApiTestCase
{
    /**
     * @var ApiClient
     */
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
     * @param Response $response
     * @param string $endpoint
     * @throws \Exception
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndpoint(Response $response, string $endpoint): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->apiClient->{$endpoint}([]);
    }

    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return [];
    }
}
