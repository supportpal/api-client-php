<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class SettingsApisTest extends ApiTest
{
    /** @var SelfServiceApi */
    protected $api;

    public function testGetSettings(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new SettingsData)->getResponse(),
            Settings::class
        );

        $this
            ->apiClient
            ->getSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $articles = $this->api->getSettings();
        self::assertEquals($expectedOutput, $articles);
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return SelfServiceApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return SelfServiceClient::class;
    }
}
