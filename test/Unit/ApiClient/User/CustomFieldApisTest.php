<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\ApiClient\UserApiClient;
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
    /** @var UserApiClient */
    protected $apiClient;

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
        $getTypeSuccessfulResponse = $this->apiClient->getCustomFields($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetUserCustomFields(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_CUSTOMFIELD, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getCustomFields($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetUserCustomFields(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_CUSTOMFIELD, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCustomFields($queryParams);
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

        $getCustomFieldTypeSuccessfulResponse = $this->apiClient->getCustomField($this->testUserCustomFieldId);
        self::assertSame($response->reveal(), $getCustomFieldTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetUserCustomField(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_CUSTOMFIELD . '/' . $this->testUserCustomFieldId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getCustomField($this->testUserCustomFieldId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetUserCustomField(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_CUSTOMFIELD . '/' . $this->testUserCustomFieldId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getCustomField($this->testUserCustomFieldId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return UserApiClient::class;
    }
}
