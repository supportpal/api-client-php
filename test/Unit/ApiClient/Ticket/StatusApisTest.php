<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class StatusApisTest extends ApiClientTest
{
    /** @var TicketClient */
    protected $apiClient;

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
        $getTypeSuccessfulResponse = $this->apiClient->getStatuses($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetStatuses(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_STATUS, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getStatuses($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetStatuses(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_STATUS, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getStatuses($queryParams);
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

        $getStatusTypeSuccessfulResponse = $this->apiClient->getStatus($this->testStatusId);
        self::assertSame($response->reveal(), $getStatusTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetStatus(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_STATUS . '/' . $this->testStatusId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getStatus($this->testStatusId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetStatus(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_STATUS . '/' . $this->testStatusId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getStatus($this->testStatusId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
