<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

class DepartmentApis extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $getDepartmentsSuccessfulResponse = DepartmentData::GET_DEPARTMENTS_SUCCESSFUL_RESPONSE;

    public function testGetDepartments(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_DEPARTMENT, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getDepartmentsSuccessfulResponse),
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
}
