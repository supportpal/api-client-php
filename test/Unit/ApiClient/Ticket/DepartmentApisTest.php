<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

/**
 * Class DepartmentApis
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket
 * @covers \SupportPal\ApiClient\ApiClient\Ticket\DepartmentApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class DepartmentApisTest extends ApiClientTest
{
    /**
     * @var int
     */
    private $testDepartmentId = 1;

    public function testGetDepartments(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_DEPARTMENT, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(DepartmentData::getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getDepartments($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetDepartments(): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_DEPARTMENT, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getDepartments($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetDepartments(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_DEPARTMENT, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getDepartments($queryParams);
    }

    public function testGetDepartment(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_DEPARTMENT . '/' . $this->testDepartmentId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(DepartmentData::getResponse()),
            $request
        );

        $getDepartmentTypeSuccessfulResponse = $this->apiClient->getDepartment($this->testDepartmentId);
        self::assertSame($response->reveal(), $getDepartmentTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetDepartment(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_DEPARTMENT . '/' . $this->testDepartmentId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getDepartment($this->testDepartmentId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetDepartment(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_DEPARTMENT . '/' . $this->testDepartmentId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getDepartment($this->testDepartmentId);
    }
}
