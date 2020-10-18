<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class PriorityApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket
 * @covers \SupportPal\ApiClient\ApiClient\Ticket\PriorityApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class PriorityApisTest extends ApiClientTest
{
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
        $getTypeSuccessfulResponse = $this->apiClient->getTicketPriorities($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetPriorities(): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_PRIORITY, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTicketPriorities($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetPriorities(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_PRIORITY, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTicketPriorities($queryParams);
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

        $getPriorityTypeSuccessfulResponse = $this->apiClient->getTicketPriority($this->testPriorityId);
        self::assertSame($response->reveal(), $getPriorityTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetPriority(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_PRIORITY . '/' . $this->testPriorityId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getTicketPriority($this->testPriorityId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetPriority(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_PRIORITY . '/' . $this->testPriorityId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getTicketPriority($this->testPriorityId);
    }
}
