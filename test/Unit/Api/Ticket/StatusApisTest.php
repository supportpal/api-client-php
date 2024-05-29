<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Ticket\Status;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class StatusApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

    public function testGetStatuses(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new StatusData)->getAllResponse(),
            Status::class
        );

        $this
            ->apiClient
            ->getStatuses([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsStatus = $this->api->getStatuses();
        self::assertEquals($expectedOutput, $ticketsStatus);
    }

    public function testGetStatus(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new StatusData)->getResponse(),
            Status::class
        );

        $this
            ->apiClient
            ->getStatus(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsStatus = $this->api->getStatus(1);
        self::assertEquals($expectedOutput, $ticketsStatus);
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
