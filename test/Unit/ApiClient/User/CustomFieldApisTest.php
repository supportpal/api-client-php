<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class CustomFieldApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\User
 * @covers \SupportPal\ApiClient\ApiClient\User\CustomFieldApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class CustomFieldApisTest extends ApiClientTest
{
    /** @var int */
    private $testUserCustomFieldId = 1;

    public function testGetUserCustomFields(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_CUSTOMFIELD, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new UserCustomFieldData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getUserCustomFields($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetUserCustomFields(): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_CUSTOMFIELD, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getUserCustomFields($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetUserCustomFields(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_CUSTOMFIELD, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUserCustomFields($queryParams);
    }

    public function testGetUserCustomField(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_CUSTOMFIELD . '/' . $this->testUserCustomFieldId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new UserCustomFieldData)->getResponse()),
            $request
        );

        $getUserCustomFieldTypeSuccessfulResponse = $this->apiClient->getUserCustomField($this->testUserCustomFieldId);
        self::assertSame($response->reveal(), $getUserCustomFieldTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetUserCustomField(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_CUSTOMFIELD . '/' . $this->testUserCustomFieldId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getUserCustomField($this->testUserCustomFieldId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetUserCustomField(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_CUSTOMFIELD . '/' . $this->testUserCustomFieldId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUserCustomField($this->testUserCustomFieldId);
    }
}
