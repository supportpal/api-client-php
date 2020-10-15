<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class ApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\TicketApis
 * @covers \SupportPal\ApiClient\Api
 */
class TicketApisTest extends ApiTest
{
    public function testGetTickets(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            TicketData::getAllResponse(),
            Ticket::class
        );

        $this
            ->apiClient
            ->getTickets([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $tickets = $this->api->getTickets();
        $this->assertSame($expectedOutput, $tickets);
    }

    public function testGetTicket(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            TicketData::getResponse(),
            Ticket::class
        );

        $this
            ->apiClient
            ->getTicket(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $tickets = $this->api->getTicket(1);
        $this->assertSame($expectedOutput, $tickets);
    }
}
