<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class SettingsApisTest extends ApiTest
{
    /** @var CoreApi */
    protected $api;

    public function testGetCoreSettings(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new CoreSettingsData)->getResponse(),
            Settings::class
        );

        $this
            ->apiClient
            ->getSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $coreSettings = $this->api->getSettings();
        self::assertEquals($expectedOutput, $coreSettings);
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return CoreApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return CoreClient::class;
    }
}
