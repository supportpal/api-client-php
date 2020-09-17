<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Functional\Api\ApiAwareTestCase;

trait CoreApisTestCase
{
    use ApiAwareTestCase;

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

    /**
     * @return iterable
     */
    abstract public function provideUnsuccessfulTestCases(): iterable;
}
