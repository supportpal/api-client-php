<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Core;

use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\ApiClient\CoreApiClient;
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
        $this->assertSame($expectedOutput, $coreSettings);
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
        return CoreApiClient::class;
    }
}
