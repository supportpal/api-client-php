<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Model\Ticket\Request\UpdateTicket;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateTicketData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\UpdateTicketData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;

class TicketApisTest extends BaseTicketApiTest
{
    public function testGetTickets(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new TicketData)->getAllResponse(), Ticket::class);

        $this->apiClient
            ->getTickets([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $tickets = $this->api->getTickets();
        self::assertEquals($output, $tickets);
    }

    public function testGetTicket(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new TicketData)->getResponse(), Ticket::class);

        $this->apiClient
            ->getTicket(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $tickets = $this->api->getTicket(1);
        self::assertEquals($output, $tickets);
    }

    public function testCreateTicket(): void
    {
        $ticketData = new TicketData;
        $createTicketData = new CreateTicketData;
        $arrayData = $createTicketData::DATA;
        [$ticketOutput, $response] = $this->makeCommonExpectations($ticketData->getResponse(), Ticket::class);

        $this->apiClient
            ->postTicket($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticket = $this->api->createTicket(new CreateTicket($arrayData));
        self::assertEquals($ticketOutput, $ticket);
    }

    public function testUpdateTicket(): void
    {
        $ticketData = new TicketData;
        $updateTicket = new UpdateTicket(UpdateTicketData::DATA);

        [$output, $response] = $this->makeCommonExpectations($ticketData->getResponse(), Ticket::class);

        $this->apiClient
            ->putTicket(self::TEST_ID, $updateTicket->toArray())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $ticket = $this->api->updateTicket(self::TEST_ID, $updateTicket);
        self::assertEquals($output, $ticket);
    }
}
