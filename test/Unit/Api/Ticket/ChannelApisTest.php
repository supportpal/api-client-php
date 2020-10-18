<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\ChannelSettings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class ChannelApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\ChannelSettingsApis
 * @covers \SupportPal\ApiClient\Api
 */
class ChannelApisTest extends ApiTest
{
    public function testGetChannelSettings(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new ChannelSettingsData)->getResponse(),
            ChannelSettings::class
        );

        $this
            ->apiClient
            ->getChannelSettings('web')
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $channelSettings = $this->api->getChannelSettings('web');
        $this->assertSame($expectedOutput, $channelSettings);
    }
}
