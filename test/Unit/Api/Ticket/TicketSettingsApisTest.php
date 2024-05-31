<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;

class TicketSettingsApisTest extends BaseTicketApiTest
{
    public function testGetTicketsSettings(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new SettingsData)->getResponse(), Settings::class);

        $this->apiClient
            ->getSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketSettings = $this->api->getSettings();
        self::assertEquals($output, $ticketSettings);
    }
}
