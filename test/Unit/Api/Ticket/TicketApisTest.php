<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateTicketData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class TicketApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

    public function testGetTickets(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new TicketData)->getAllResponse(),
            Ticket::class
        );

        $this
            ->apiClient
            ->getTickets([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $tickets = $this->api->getTickets();
        self::assertEquals($expectedOutput, $tickets);
    }

    public function testGetTicket(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new TicketData)->getResponse(),
            Ticket::class
        );

        $this
            ->apiClient
            ->getTicket(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $tickets = $this->api->getTicket(1);
        self::assertEquals($expectedOutput, $tickets);
    }

    public function testPostTicket(): void
    {
        $ticketData = new TicketData;
        $createTicketData = new CreateTicketData;
        $arrayData = $createTicketData::DATA;
        [$response, $ticketOutput] = $this->postCommonExpectations(
            $ticketData->getResponse(),
            Ticket::class
        );

        $this
            ->apiClient
            ->postTicket($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticket = $this->api->postTicket(new CreateTicket($arrayData));
        self::assertEquals($ticketOutput, $ticket);
    }

    public function testPutTicket(): void
    {
        $ticketData = new TicketData;

        [$response, $output] = $this->postCommonExpectations(
            $ticketData->getResponse(),
            Ticket::class,
        );

        $this
            ->apiClient
            ->updateTicket(self::TEST_ID, $ticketData->getArrayData())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $ticket = $this->api->updateTicket(new Ticket(['id' => self::TEST_ID]), $ticketData->getArrayData());
        self::assertEquals($output, $ticket);
    }

    public function testPutTicketWithoutIdentifier(): void
    {
        $ticketData = new TicketData;
        $input = $this->prophesize(Ticket::class);
        self::expectException(MissingIdentifierException::class);
        /** @var Ticket $ticket */
        $ticket = $input->reveal();
        $this->api->updateTicket($ticket, $ticketData->getArrayData());
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
