<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
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
    /** @var int */
    private $testTicketId = 1;

    /** @var int */
    private $testMessageId = 1;

    public function testGetTicketMessages(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new MessageData)->getAllResponse(),
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
            (new MessageData)->getResponse(),
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

    public function testPostTicketMessage(): void
    {
        $messageData = new MessageData;
        $arrayData = $messageData->getArrayData();

        [$response, $messageMock, $messageOutput] = $this->postCommonExpectations(
            $messageData->getResponse(),
            $arrayData,
            Message::class
        );

        $this
            ->apiClient
            ->postTicketMessage($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $message = $this->api->postTicketMessage($messageMock);
        $this->assertSame($messageOutput->reveal(), $message);
    }

    public function testPostWithIncompleteData(): void
    {
        /** @var Message $messageMock */
        $messageMock = $this->postIncompleteDataCommonExpectations(Message::class);
        $this->expectException(InvalidArgumentException::class);
        $this->api->postTicketMessage($messageMock);
    }
}
