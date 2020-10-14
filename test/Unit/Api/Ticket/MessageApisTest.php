<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Message;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class MessageApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\MessageApis
 * @covers \SupportPal\ApiClient\Api
 */
class MessageApisTest extends ApiTest
{
    /**
     * @var int
     */
    private $testTicketId = 1;

    /**
     * @var int
     */
    private $testMessageId = 1;

    public function testGetTicketMessages(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            MessageData::getAllResponse(),
            Message::class
        );

        $this
            ->apiClient
            ->getTicketMessages(['ticket_id' => $this->testTicketId])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $departments = $this->api->getTicketMessages($this->testTicketId);
        self::assertSame($expectedOutput, $departments);
    }

    public function testGetTicketMessage(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            MessageData::getResponse(),
            Message::class
        );

        $this
            ->apiClient
            ->getTicketMessage($this->testMessageId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedDepartment = $this->api->getTicketMessage($this->testMessageId);
        self::assertSame($expectedOutput, $returnedDepartment);
    }
}
