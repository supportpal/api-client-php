<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Ticket\ChannelSettings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class ChannelApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

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
        self::assertEquals($expectedOutput, $channelSettings);
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return TicketApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
