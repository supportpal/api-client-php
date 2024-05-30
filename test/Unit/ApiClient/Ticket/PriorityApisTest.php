<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class PriorityApisTest extends ApiClientTest
{
    /** @var TicketClient */
    protected $apiClient;

    /** @var int */
    private $testPriorityId = 1;

    public function testGetPriorities(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_PRIORITY, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new PriorityData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getPriorities($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetPriorities(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_PRIORITY, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getPriorities($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetPriorities(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_PRIORITY, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getPriorities($queryParams);
    }

    public function testGetPriority(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_PRIORITY . '/' . $this->testPriorityId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new PriorityData)->getResponse()),
            $request
        );

        $getPriorityTypeSuccessfulResponse = $this->apiClient->getPriority($this->testPriorityId);
        self::assertSame($response->reveal(), $getPriorityTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetPriority(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_PRIORITY . '/' . $this->testPriorityId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getPriority($this->testPriorityId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetPriority(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_PRIORITY . '/' . $this->testPriorityId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getPriority($this->testPriorityId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return TicketClient::class;
    }
}
