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

    public function testGetTicketMessages(): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new MessageData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getMessages($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetTicketMessages(): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getMessages($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTicketMessages(int $statusCode, string $responseBody): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getMessages($queryParams);
    }

    public function testGetTicketMessage(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new DepartmentData)->getResponse()),
            $request
        );

        $getMessageSuccessfulResponse = $this->apiClient->getMessage($this->testMessageId);
        self::assertSame($response->reveal(), $getMessageSuccessfulResponse);
    }

    public function testHttpExceptionGetTicketMessage(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getMessage($this->testMessageId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTicketMessage(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getMessage($this->testMessageId);
    }

    public function testTicketMessage(): void
    {
        $commentData = new MessageData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_MESSAGE, [], []);
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
    public function testUnsuccessfulTicketMessage(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_MESSAGE, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postMessage([]);
    }

    public function testHttpExceptionTicketMessage(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_MESSAGE, [], []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->postMessage([]);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
