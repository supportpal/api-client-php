<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

class ApiClientTest extends ContainerAwareBaseTestCase
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
}
