<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class SettingsApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers SupportPal\ApiClient\Api\SelfService\SettingsApis
 * @covers \SupportPal\ApiClient\Api
 */
class SettingsApisTest extends ApiTest
{
    public function testGetSettings(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            SettingsData::GET_SETTINGS_SUCCESSFUL_RESPONSE,
            Settings::class
        );

        $this
            ->apiClient
            ->getSelfServiceSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $articles = $this->api->getSelfServiceSettings();
        self::assertSame($expectedOutput, $articles);
    }
}
