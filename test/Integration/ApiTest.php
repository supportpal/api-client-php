<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Tests\ApiTestCase;

abstract class ApiTest extends ApiTestCase
{
    /**
     * @var Api
     */
    protected $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = $this->getSupportPal()->getApi();
    }

    /**
     * @param Response $response
     * @param string $endpoint
     * @dataProvider provideGetEndpointsUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetEndPoints(Response $response, string $endpoint): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->api->{$endpoint}();
    }
}
