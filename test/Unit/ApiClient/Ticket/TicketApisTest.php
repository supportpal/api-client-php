<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class PriorityApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket
 * @covers \SupportPal\ApiClient\ApiClient\TicketApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class TicketApisTest extends ApiClientTest
{
    /** @var int */
    private $testTicketId = 1;

    public function testGetTickets(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_TICKET, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new TicketData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getTickets($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetTickets(): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_TICKET, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTickets($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTickets(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_TICKET, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTickets($queryParams);
    }

    public function testGetTicket(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_TICKET . '/' . $this->testTicketId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new TicketData)->getResponse()),
            $request
        );

        $getTicketTypeSuccessfulResponse = $this->apiClient->getTicket($this->testTicketId);
        self::assertSame($response->reveal(), $getTicketTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetTicket(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_TICKET . '/' . $this->testTicketId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTicket($this->testTicketId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTicket(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_TICKET . '/' . $this->testTicketId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTicket($this->testTicketId);
    }

    public function testPostTicket(): void
    {
        $ticketData = new TicketData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_TICKET, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($ticketData->getResponse()),
            $request
        );

        $postTicketResponse = $this->apiClient->postTicket([]);
        self::assertSame($response->reveal(), $postTicketResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testPostUnsuccessfulTicket(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_TICKET, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postTicket([]);
    }

    public function testHttpExceptionPostTicket(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::TICKET_TICKET, [], []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->postTicket([]);
    }

    public function testUpdateTicket(): void
    {
        $ticketData = new TicketData;
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::TICKET_TICKET . '/' . $this->testTicketId,
            [],
            $ticketData->getArrayData()
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($ticketData->getResponse()),
            $request
        );

        $updateTicketTypeSuccessfulResponse = $this
            ->apiClient
            ->updateTicket($this->testTicketId, $ticketData->getArrayData());
        self::assertSame($response->reveal(), $updateTicketTypeSuccessfulResponse);
    }

    public function testHttpExceptionUpdateTicket(): void
    {
        $ticketData = new TicketData;
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::TICKET_TICKET . '/' . $this->testTicketId,
            [],
            $ticketData->getArrayData()
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->updateTicket($this->testTicketId, $ticketData->getArrayData());
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulUpdateTicket(int $statusCode, string $responseBody): void
    {
        $ticketData = new TicketData;
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::TICKET_TICKET . '/' . $this->testTicketId,
            [],
            $ticketData->getArrayData()
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->updateTicket($this->testTicketId, $ticketData->getArrayData());
    }
}
