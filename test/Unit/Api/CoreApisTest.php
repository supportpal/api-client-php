<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

trait CoreApisTest
{

    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    /**
     * @var Api
     */
    private $api;

    public function testGetCoreSettings(): void
    {
        $coreSettingsOutput = $this->prophesize(CoreSettings::class);

        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($this->coreSettingsSuccessfulResponse));

        $this
            ->apiClient
            ->getCoreSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $this
            ->modelCollectionFactory
            ->create(CoreSettings::class, $this->coreSettingsSuccessfulResponse['data'])
            ->willReturn($coreSettingsOutput->reveal());

        $comment = $this->api->getCoreSettings();
        $this->assertSame($coreSettingsOutput->reveal(), $comment);
    }
}
