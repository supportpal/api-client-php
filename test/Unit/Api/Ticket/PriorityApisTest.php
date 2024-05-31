<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Priority;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;

class PriorityApisTest extends BaseTicketApiTest
{
    public function testGetPriorities(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new PriorityData)->getAllResponse(), Priority::class);

        $this->apiClient
            ->getPriorities([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsPriority = $this->api->getPriorities();
        self::assertEquals($output, $ticketsPriority);
    }

    public function testGetPriority(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new PriorityData)->getResponse(), Priority::class);

        $this->apiClient
            ->getPriority(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsPriority = $this->api->getPriority(1);
        self::assertEquals($output, $ticketsPriority);
    }
}
