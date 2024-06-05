<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\DataFixtures\User\OrganisationCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class OrganisationCustomFieldApisTest extends ApiClientTest
{
    /** @var UserClient */
    protected $apiClient;

    /** @var int */
    private $testCustomFieldId = 1;

    public function testGetUserCustomFields(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_ORGANISATION_CUSTOMFIELD, $queryParams);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new OrganisationCustomFieldData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getOrganisationCustomFields($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetOrganisationCustomFields(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_ORGANISATION_CUSTOMFIELD, $queryParams);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getOrganisationCustomFields($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetOrganisationCustomFields(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_ORGANISATION_CUSTOMFIELD, $queryParams);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getOrganisationCustomFields($queryParams);
    }

    public function testGetOrganisationCustomField(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_ORGANISATION_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new OrganisationCustomFieldData)->getResponse()),
            $request
        );

        $getOrganisationCustomFieldTypeSuccessfulResponse = $this->apiClient->getOrganisationCustomField($this->testCustomFieldId);
        self::assertSame($response->reveal(), $getOrganisationCustomFieldTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetOrganisationCustomField(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_ORGANISATION_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getOrganisationCustomField($this->testCustomFieldId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetOrganisationCustomField(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_ORGANISATION_CUSTOMFIELD . '/' . $this->testCustomFieldId,
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getOrganisationCustomField($this->testCustomFieldId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
