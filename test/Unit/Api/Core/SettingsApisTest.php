<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Core\SettingsData;

class SettingsApisTest extends BaseCoreApiTestCaseCase
{
    public function testGetCoreSettings(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new SettingsData)->getResponse(), Settings::class);

        $this->apiClient
            ->getSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $coreSettings = $this->api->getSettings();
        self::assertEquals($output, $coreSettings);
    }
}
