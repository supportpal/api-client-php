<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

/**
 * Class MessageApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket
 * @covers \SupportPal\ApiClient\ApiClient\Ticket\MessageApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class MessageApisTest extends ApiClientTest
{
    /**
     * @var int
     */
    private $testMessageId = 1;

    /**
     * @var int
     */
    private $testTicketId = 1;

    public function testGetTicketMessages(): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(MessageData::getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getTicketMessages($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetTicketMessages(): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTicketMessages($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTicketMessages(int $statusCode, string $responseBody): void
    {
        $queryParams = ['ticket_id' => $this->testTicketId];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_MESSAGE, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTicketMessages($queryParams);
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
            (string) json_encode(DepartmentData::getResponse()),
            $request
        );

        $getTicketMessageSuccessfulResponse = $this->apiClient->getTicketMessage($this->testMessageId);
        self::assertSame($response->reveal(), $getTicketMessageSuccessfulResponse);
    }

    public function testHttpExceptionGetTicketMessage(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTicketMessage($this->testMessageId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTicketMessage(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_MESSAGE . '/' . $this->testMessageId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTicketMessage($this->testMessageId);
    }
}
