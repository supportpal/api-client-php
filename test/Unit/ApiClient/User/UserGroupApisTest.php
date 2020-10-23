<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class UserGroupApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\User
 * @covers \SupportPal\ApiClient\ApiClient\User\UserGroupApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class UserGroupApisTest extends ApiClientTest
{
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
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_USERGROUP, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getUserGroups($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetUserGroups(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
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
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_USERGROUP . '/' . $this->testUserGroupId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getUserGroup($this->testUserGroupId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetUserGroup(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_USERGROUP . '/' . $this->testUserGroupId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUserGroup($this->testUserGroupId);
    }
}
