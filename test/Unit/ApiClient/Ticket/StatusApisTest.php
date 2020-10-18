<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class StatusApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket
 * @covers \SupportPal\ApiClient\ApiClient\Ticket\StatusApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class StatusApisTest extends ApiClientTest
{
    /** @var int */
    private $testStatusId = 1;

    public function testGetStatuses(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_STATUS, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new StatusData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getTicketStatuses($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetStatuses(): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_STATUS, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTicketStatuses($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetStatuses(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_STATUS, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTicketStatuses($queryParams);
    }

    public function testGetStatus(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_STATUS . '/' . $this->testStatusId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new StatusData)->getResponse()),
            $request
        );

        $getStatusTypeSuccessfulResponse = $this->apiClient->getTicketStatus($this->testStatusId);
        self::assertSame($response->reveal(), $getStatusTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetStatus(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_STATUS . '/' . $this->testStatusId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTicketStatus($this->testStatusId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetStatus(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_STATUS . '/' . $this->testStatusId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTicketStatus($this->testStatusId);
    }
}
