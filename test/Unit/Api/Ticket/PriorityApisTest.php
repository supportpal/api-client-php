<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Model\Ticket\Priority;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class PriorityApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\PriorityApis
 * @covers \SupportPal\ApiClient\Api\Api
 */
class PriorityApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

    public function testGetPriorities(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new PriorityData)->getAllResponse(),
            Priority::class
        );

        $this
            ->apiClient
            ->getPriorities([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsPriority = $this->api->getPriorities();
        $this->assertSame($expectedOutput, $ticketsPriority);
    }

    public function testGetsPriority(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new PriorityData)->getResponse(),
            Priority::class
        );

        $this
            ->apiClient
            ->getPriority(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketsPriority = $this->api->getPriority(1);
        $this->assertSame($expectedOutput, $ticketsPriority);
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
