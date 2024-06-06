<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Message;
use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use SupportPal\ApiClient\Model\Ticket\Request\UpdateMessage;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\UpdateMessageData;

class MessageApisTest extends BaseTicketApiTest
{
    /** @var int */
    private $testMessageId = 1;

    public function testGetMessages(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new MessageData)->getAllResponse(), Message::class);

        $this->apiClient
            ->getMessages(['ticket_id' => $this->testMessageId])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $departments = $this->api->getMessages($this->testMessageId);
        self::assertEquals($output, $departments);
    }

    public function testGetMessage(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new MessageData)->getResponse(), Message::class);

        $this->apiClient
            ->getMessage($this->testMessageId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedDepartment = $this->api->getMessage($this->testMessageId);
        self::assertEquals($output, $returnedDepartment);
    }

    public function testCreateMessage(): void
    {
        $messageData = new MessageData;
        $arrayData = $messageData->getArrayData();

        [$messageOutput, $response] = $this->makeCommonExpectations($messageData->getResponse(), Message::class);

        $this->apiClient
            ->postMessage($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $message = $this->api->createMessage(new CreateMessage($arrayData));
        self::assertEquals($messageOutput, $message);
    }

    public function testUpdateMessage(): void
    {
        $ticketData = new MessageData;
        $updateMessage = new UpdateMessage(UpdateMessageData::DATA);

        [$output, $response] = $this->makeCommonExpectations($ticketData->getResponse(), Message::class);

        $this->apiClient
            ->putMessage(self::TEST_ID, $updateMessage->toArray())
            ->willReturn($response->reveal())
            ->shouldBeCalled();

        $ticket = $this->api->updateMessage(self::TEST_ID, $updateMessage);
        self::assertEquals($output, $ticket);
    }

    public function testDeleteMessage(): void
    {
        $response = $this->makeSuccessResponse();

        $this->apiClient
            ->deleteMessage(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $apiResponse = $this->api->deleteMessage(1);
        self::assertTrue($apiResponse);
    }
}
