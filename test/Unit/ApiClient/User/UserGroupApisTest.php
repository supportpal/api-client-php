<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use PHPUnit\Framework\Attributes\DataProvider;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class UserGroupApisTest extends ApiClientTest
{
    /** @var UserClient */
    protected $apiClient;

    /** @var int */
    private $testUserGroupId = 1;

    public function testGetUserGroups(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_USERGROUP, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new GroupData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getUserGroups($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetUserGroups(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_USERGROUP, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getUserGroups($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody     */
    #[DataProvider('provideUnsuccessfulTestCases')]
    public function testUnsuccessfulGetUserGroups(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_USERGROUP, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUserGroups($queryParams);
    }

    public function testGetUserGroup(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_USERGROUP . '/' . $this->testUserGroupId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new GroupData)->getResponse()),
            $request
        );

        $getUserGroupTypeSuccessfulResponse = $this->apiClient->getUserGroup($this->testUserGroupId);
        self::assertSame($response->reveal(), $getUserGroupTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetUserGroup(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_USERGROUP . '/' . $this->testUserGroupId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getUserGroup($this->testUserGroupId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody     */
    #[DataProvider('provideUnsuccessfulTestCases')]
    public function testUnsuccessfulGetUserGroup(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_USERGROUP . '/' . $this->testUserGroupId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUserGroup($this->testUserGroupId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
