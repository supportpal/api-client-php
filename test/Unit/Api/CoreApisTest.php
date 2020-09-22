<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class CoreApisTest extends ApiTest
{
    /**
     * @var array<mixed>
     */
    private $coreSettingsSuccessfulResponse = CoreSettingsData::CORE_SETTINGS_SUCCESSFUL_RESPONSE;

    public function testGetCoreSettings(): void
    {
        $coreSettingsOutput = $this->prophesize(CoreSettings::class);
        $formatType = 'json';

        $response = $this->prophesize(ResponseInterface::class);
        $response
            ->getBody()
            ->willReturn(json_encode($this->coreSettingsSuccessfulResponse));

        $this->decoder
            ->decode(json_encode($this->coreSettingsSuccessfulResponse), $formatType)
            ->shouldBeCalled()
            ->willReturn($this->coreSettingsSuccessfulResponse);

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
