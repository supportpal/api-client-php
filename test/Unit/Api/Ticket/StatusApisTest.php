<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Status;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class StatusApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\StatusApis
 * @covers \SupportPal\ApiClient\Api
 */
class StatusApisTest extends ApiTest
{
    public function testGetTicketsStatuses(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new StatusData)->getAllResponse(),
            Status::class
        );

        $this
            ->apiClient
            ->getTicketStatuses([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsStatus = $this->api->getTicketStatuses();
        $this->assertSame($expectedOutput, $ticketsStatus);
    }

    public function testGetTicketsStatus(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new StatusData)->getResponse(),
            Status::class
        );

        $this
            ->apiClient
            ->getTicketStatus(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsStatus = $this->api->getTicketStatus(1);
        $this->assertSame($expectedOutput, $ticketsStatus);
    }
}
