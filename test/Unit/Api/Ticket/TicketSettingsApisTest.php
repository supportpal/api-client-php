<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class TicketApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\SettingsApis
 * @covers \SupportPal\ApiClient\Api
 */
class TicketSettingsApisTest extends ApiTest
{
    public function testGetTicketsSettings(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            SettingsData::getResponse(),
            Settings::class
        );

        $this
            ->apiClient
            ->getTicketSettings()
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketSettings = $this->api->getTicketSettings();
        $this->assertSame($expectedOutput, $ticketSettings);
    }
}
