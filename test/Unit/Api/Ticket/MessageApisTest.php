<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\Message;
use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;

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
}
