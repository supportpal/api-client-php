<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class UserCustomFieldApisTest extends ApiClientTest
{
    /** @var UserClient */
    protected $apiClient;

    /** @var int */
    private $testCustomFieldId = 1;

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
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_CUSTOMFIELD, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
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
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_CUSTOMFIELD, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUserCustomFields($queryParams);
    }

    public function testGetUserCustomField(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new UserCustomFieldData)->getResponse()),
            $request
        );

        $getUserCustomFieldTypeSuccessfulResponse = $this->apiClient->getUserCustomField($this->testCustomFieldId);
        self::assertSame($response->reveal(), $getUserCustomFieldTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetUserCustomField(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getUserCustomField($this->testCustomFieldId);
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
            ApiDictionary::USER_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUserCustomField($this->testCustomFieldId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
