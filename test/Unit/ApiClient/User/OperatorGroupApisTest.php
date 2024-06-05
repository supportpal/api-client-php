<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class OperatorGroupApisTest extends ApiClientTest
{
    /** @var UserClient */
    protected $apiClient;

    /** @var int */
    private $testOperatorGroupId = 1;

    public function testGetOperatorGroups(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_OPERATORGROUP, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new GroupData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getOperatorGroups($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetOperatorGroups(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_OPERATORGROUP, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getOperatorGroups($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetOperatorGroups(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_OPERATORGROUP, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getOperatorGroups($queryParams);
    }

    public function testGetOperatorGroup(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_OPERATORGROUP . '/' . $this->testOperatorGroupId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new GroupData)->getResponse()),
            $request
        );

        $getOperatorGroupTypeSuccessfulResponse = $this->apiClient->getOperatorGroup($this->testOperatorGroupId);
        self::assertSame($response->reveal(), $getOperatorGroupTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetOperatorGroup(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_OPERATORGROUP . '/' . $this->testOperatorGroupId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getOperatorGroup($this->testOperatorGroupId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetOperatorGroup(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_OPERATORGROUP . '/' . $this->testOperatorGroupId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getOperatorGroup($this->testOperatorGroupId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
