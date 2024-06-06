<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class MessageApisTest extends ApiClientTest
{
    /** @var TicketClient */
    protected $apiClient;

    /** @var int */
    private $testMessageId = 1;

    /** @var int */
    private $testTicketId = 1;

    public function testGetMessages(): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new MessageData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getMessages($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetMessages(): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getMessages($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetMessages(int $statusCode, string $responseBody): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getMessages($queryParams);
    }

    public function testGetMessage(): void
    {
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId);

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new DepartmentData)->getResponse()),
            $request
        );

        $getMessageSuccessfulResponse = $this->apiClient->getMessage($this->testMessageId);
        self::assertSame($response->reveal(), $getMessageSuccessfulResponse);
    }

    public function testHttpExceptionGetMessage(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getMessage($this->testMessageId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetMessage(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getMessage($this->testMessageId);
    }

    public function testPostMessage(): void
    {
        $commentData = new MessageData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_MESSAGE);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($commentData->getResponse()),
            $request
        );

        $postMessageResponse = $this->apiClient->postMessage([]);
        self::assertSame($response->reveal(), $postMessageResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulPostMessage(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_MESSAGE);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postMessage([]);
    }

    public function testHttpExceptionPostMessage(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_MESSAGE);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->postMessage([]);
    }

    public function testUpdateMessage(): void
    {
        $messageData = new MessageData;
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId,
            [],
            $messageData->getArrayData()
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($messageData->getResponse()),
            $request
        );

        $updateMessageTypeSuccessfulResponse = $this->apiClient->putMessage($this->testMessageId, $messageData->getArrayData());
        self::assertSame($response->reveal(), $updateMessageTypeSuccessfulResponse);
    }

    public function testHttpExceptionUpdateMessage(): void
    {
        $messageData = new MessageData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId,
            [],
            $messageData->getArrayData()
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->putMessage($this->testMessageId, $messageData->getArrayData());
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulUpdateMessage(int $statusCode, string $responseBody): void
    {
        $messageData = new MessageData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId,
            [],
            $messageData->getArrayData()
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->putMessage($this->testMessageId, $messageData->getArrayData());
    }

    public function testDeleteMessage(): void
    {
        $request = $this->requestCommonExpectations('DELETE', ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId);

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(['status' => 'success']),
            $request
        );

        $messageDeleteResponse = $this->apiClient->deleteMessage($this->testMessageId);

        self::assertSame($response->reveal(), $messageDeleteResponse);
    }

    public function testHttpExceptionDeleteMessage(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('DELETE', ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->deleteMessage($this->testMessageId);
    }

    /**
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulDeleteMessage(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('DELETE', ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->deleteMessage($this->testMessageId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
