<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket;

use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class DepartmentApis
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\Ticket
 * @covers \SupportPal\ApiClient\ApiClient\Ticket\CustomFieldApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class CustomFieldApisTest extends ApiClientTest
{
    /** @var TicketApiClient */
    protected $apiClient;

    /** @var int */
    private $testCustomFieldId = 1;

    public function testGetTicketCustomFields(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_CUSTOMFIELD, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new TicketCustomFieldData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getCustomFields($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetTicketCustomFields(): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_CUSTOMFIELD, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getCustomFields($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetTicketCustomFields(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::TICKET_CUSTOMFIELD, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCustomFields($queryParams);
    }

    public function testGetCustomField(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new TicketCustomFieldData)->getResponse()),
            $request
        );

        $getCustomFieldTypeSuccessfulResponse = $this->apiClient->getCustomField($this->testCustomFieldId);
        self::assertSame($response->reveal(), $getCustomFieldTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetCustomField(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getCustomField($this->testCustomFieldId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetCustomField(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::TICKET_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCustomField($this->testCustomFieldId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return TicketApiClient::class;
    }
}
