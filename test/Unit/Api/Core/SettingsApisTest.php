<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api
 * @covers \SupportPal\ApiClient\Api\Core\SettingsApis
 * @covers \SupportPal\ApiClient\Api
 */
class SettingsApisTest extends ApiTest
{
    public function testGetCoreSettings(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new CoreSettingsData)->getResponse(),
            Settings::class
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
