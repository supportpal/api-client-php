<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Integration\ApiTest;

class CoreApisTest extends ApiTest
{
    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    public function testGetCoreSettings(): void
    {
        $this->appendRequestResponse(
            new Response(
                200,
                [],
                (string) $this->getEncoder()->encode($this->coreSettingsSuccessfulResponse, $this->getFormatType())
            )
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
}
