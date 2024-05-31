<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\ChannelSettings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;

class ChannelApisTest extends BaseTicketApiTest
{
    public function testGetChannelSettings(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new ChannelSettingsData)->getResponse(),
            ChannelSettings::class
        );

        $this->apiClient
            ->getChannelSettings('web')
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $channelSettings = $this->api->getChannelSettings('web');
        self::assertEquals($output, $channelSettings);
    }
}
