<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class UserApisTest extends ApiClientTest
{
    /** @var UserClient */
    protected $apiClient;

    /** @var int */
    private $testUserId = 1;

    public function testGetUsers(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_USER, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new UserData)->getAllResponse()),
            $request
        );
        $getUsersResponse = $this->apiClient->getUsers($queryParams);
        self::assertSame($response->reveal(), $getUsersResponse);
    }

    public function testHttpExceptionGetUsers(): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_USER, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getUsers($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetUsers(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_USER, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUsers($queryParams);
    }

    public function testGetUser(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_USER . '/' . $this->testUserId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new UserData)->getResponse()),
            $request
        );

        $getUserTypeSuccessfulResponse = $this->apiClient->getUser($this->testUserId);
        self::assertSame($response->reveal(), $getUserTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetUser(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_USER . '/' . $this->testUserId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getUser($this->testUserId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetUser(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_USER . '/' . $this->testUserId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getUser($this->testUserId);
    }

    public function testPostUser(): void
    {
        $ticketData = new UserData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_USER, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($ticketData->getResponse()),
            $request
        );

        $postUserResponse = $this->apiClient->postUser([]);
        self::assertSame($response->reveal(), $postUserResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testPostUnsuccessfulUser(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_USER, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postUser([]);
    }

    public function testHttpExceptionPostUser(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_USER, [], []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->postUser([]);
    }

    public function testUpdateUser(): void
    {
        $userData = new UserData;
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_USER . '/' . $this->testUserId,
            [],
            $userData->getArrayData()
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($userData->getResponse()),
            $request
        );

        $updateUserTypeSuccessfulResponse = $this->apiClient->putUser($this->testUserId, $userData->getArrayData());
        self::assertSame($response->reveal(), $updateUserTypeSuccessfulResponse);
    }

    public function testHttpExceptionUpdateUser(): void
    {
        $userData = new UserData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_USER . '/' . $this->testUserId,
            [],
            $userData->getArrayData()
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->putUser($this->testUserId, $userData->getArrayData());
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulUpdateUser(int $statusCode, string $responseBody): void
    {
        $userData = new UserData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_USER . '/' . $this->testUserId,
            [],
            $userData->getArrayData()
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->putUser($this->testUserId, $userData->getArrayData());
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
