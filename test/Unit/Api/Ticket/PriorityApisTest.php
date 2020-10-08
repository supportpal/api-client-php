<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Priority;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class PriorityApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\PriorityApis
 * @covers \SupportPal\ApiClient\Api
 */
class PriorityApisTest extends ApiTest
{
    public function testGetTicketsPriority(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            PriorityData::GET_PRIORITIES_SUCCESSFUL_RESPONSE,
            Priority::class
        );

        $this
            ->apiClient
            ->getTicketPriorities([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsPriority = $this->api->getTicketPriorities();
        $this->assertSame($expectedOutput, $ticketsPriority);
    }
}
