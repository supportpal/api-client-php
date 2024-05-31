<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;

class SettingsApisTest extends BaseSelfServiceApiTest
{
    public function testGetSettings(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new SettingsData)->getResponse(), Settings::class);

        $this
            ->apiClient->getSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $articles = $this->api->getSettings();
        self::assertEquals($output, $articles);
    }
}
