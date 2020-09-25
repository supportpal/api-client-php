<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api;

use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api
 */
class CoreApisTest extends ApiTest
{
    public function testGetCoreSettings(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE,
            CoreSettings::class
        );

        $this
            ->apiClient
            ->getCoreSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $coreSettings = $this->api->getCoreSettings();
        $this->assertSame($expectedOutput, $coreSettings);
    }
}
