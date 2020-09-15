<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

trait CoreApisTestCase
{
    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    /**
     * @var Api
     */
    private $api;

    public function testGetCoreSettings(): void
    {
        $this->appendRequestResponse(
            new Response(200, [], (string) json_encode($this->coreSettingsSuccessfulResponse))
        );
        $coreSettings = $this->api->getCoreSettings();
        self::assertInstanceOf(CoreSettings::class, $coreSettings);
        $this->assertArrayEqualsObjectFields($coreSettings, $this->coreSettingsSuccessfulResponse['data']);
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulTestCases
     * @throws \Exception
     */
    public function testUnsuccessfulGetCoreSettings(Response $response): void
    {
        $this->prepareUnsuccessfulApiRequest($response);
        $this->api->getCoreSettings();
    }

    /**
     * @param Response $response
     */
    abstract protected function prepareUnsuccessfulApiRequest(Response $response): void;

    /**
     * @param Response $response
     */
    abstract protected function appendRequestResponse(Response $response): void;

    /**
     * @return iterable
     */
    abstract public function provideUnsuccessfulTestCases(): iterable;
}
