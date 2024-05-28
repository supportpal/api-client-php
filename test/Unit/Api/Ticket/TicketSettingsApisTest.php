<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class TicketApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\Settings
 * @covers \SupportPal\ApiClient\Api\Api
 */
class TicketSettingsApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

    public function testGetTicketsSettings(): void
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

        $ticketSettings = $this->api->getSettings();
        self::assertEquals($expectedOutput, $ticketSettings);
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
