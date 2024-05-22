<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Model\Ticket\Message;
use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class MessageApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\MessageApis
 * @covers \SupportPal\ApiClient\Api\Api
 */
class MessageApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

    /** @var int */
    private $testMessageId = 1;

    public function testGetMessages(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new MessageData)->getAllResponse(),
            Message::class
        );

        $this
            ->apiClient
            ->getMessages(['ticket_id' => $this->testMessageId])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $departments = $this->api->getMessages($this->testMessageId);
        self::assertSame($expectedOutput, $departments);
    }

    public function testGetMessage(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new MessageData)->getResponse(),
            Message::class
        );

        $this
            ->apiClient
            ->getMessage($this->testMessageId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedDepartment = $this->api->getMessage($this->testMessageId);
        self::assertSame($expectedOutput, $returnedDepartment);
    }

    public function testPostMessage(): void
    {
        $messageData = new MessageData;
        $arrayData = $messageData->getArrayData();

        [$response, $messageOutput] = $this->postCommonExpectations(
            $messageData->getResponse(),
            Message::class
        );

        $this
            ->apiClient
            ->postMessage($arrayData)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $message = $this->api->postMessage(new CreateMessage($arrayData));
        self::assertSame($messageOutput->reveal(), $message);
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
