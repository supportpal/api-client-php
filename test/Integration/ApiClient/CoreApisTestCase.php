<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

trait CoreApisTestCase
{
    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    /**
     * @var ApiClient
     */
    private $apiClient;

    public function testGetCoreSettings(): void
    {
        $this->appendRequestResponse(
            new Response(200, [], (string) json_encode($this->coreSettingsSuccessfulResponse))
        );
        $response = $this->apiClient->getCoreSettings();
        self::assertInstanceOf(Response::class, $response);
        self::assertSame($this->coreSettingsSuccessfulResponse, json_decode((string) $response->getBody(), true));
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulGetCoreSettings(Response $response): void
    {
        $this->appendRequestResponse($response);
        self::expectException(HttpResponseException::class);
        self::expectExceptionMessage((string) json_decode((string) $response->getBody(), true)['message']);
        $this->apiClient->getCoreSettings();
    }

    /**
     * @param Response $response
     */
    abstract protected function appendRequestResponse(Response $response): void;

    /**
     * @return iterable
     */
    abstract public function provideUnsuccessfulTestCases(): iterable;
}
