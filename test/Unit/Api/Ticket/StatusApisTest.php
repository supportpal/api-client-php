<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Status;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;

class StatusApisTest extends BaseTicketApiTest
{
    public function testGetStatuses(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new StatusData)->getAllResponse(), Status::class);

        $this->apiClient
            ->getStatuses([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsStatus = $this->api->getStatuses();
        self::assertEquals($output, $ticketsStatus);
    }

    public function testGetStatus(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new StatusData)->getResponse(), Status::class);

        $this->apiClient
            ->getStatus(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsStatus = $this->api->getStatus(1);
        self::assertEquals($output, $ticketsStatus);
    }
}
