<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateTicketData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class ApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\TicketApi
 * @covers \SupportPal\ApiClient\Api
 */
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
        $this->assertSame($expectedOutput, $tickets);
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
        $this->assertSame($expectedOutput, $tickets);
    }

    public function testPostTicket(): void
    {
        $ticketData = new TicketData;
        $createTicketData = new CreateTicketData;
        $arrayData = $createTicketData::DATA;
        [$response, $ticketMock, $ticketOutput] = $this->postCommonExpectations(
            $ticketData->getResponse(),
            $arrayData,
            CreateTicket::class,
            Ticket::class
        );

        $this
            ->apiClient
            ->postTicket($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticket = $this->api->postTicket($ticketMock);
        $this->assertSame($ticketOutput->reveal(), $ticket);
    }

    public function testPostWithIncompleteData(): void
    {
        /** @var CreateTicket $ticket */
        $ticket = $this->postIncompleteDataCommonExpectations(CreateTicket::class);
        $this->expectException(InvalidArgumentException::class);
        $this->api->postTicket($ticket);
    }

    public function testPutTicket(): void
    {
        $ticketData = new TicketData;

        [$response, $inputMock, $output] = $this->putCommonExpectations(
            Ticket::class,
            $ticketData->getResponse()
        );

        $this
            ->apiClient
            ->updateTicket(self::TEST_ID, $ticketData->getArrayData())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $ticket = $this->api->updateTicket($inputMock, $ticketData->getArrayData());
        $this->assertSame($output->reveal(), $ticket);
    }

    public function testPutTicketWithoutIdentifier(): void
    {
        $ticketData = new TicketData;
        $input = $this->prophesize(Ticket::class);
        $input->getId()->willReturn(null)->shouldBeCalled();
        $this->expectException(MissingIdentifierException::class);
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
        return TicketApiClient::class;
    }
}
