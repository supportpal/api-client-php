<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\DataFixtures\User\OperatorData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class OperatorApisTest extends ApiClientTest
{
    /** @var UserClient */
    protected $apiClient;

    /** @var int */
    private $testOperatorId = 1;

    public function testGetOperators(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_OPERATOR, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new OperatorData)->getAllResponse()),
            $request
        );
        $getOperatorsResponse = $this->apiClient->getOperators($queryParams);
        self::assertSame($response->reveal(), $getOperatorsResponse);
    }

    public function testHttpExceptionGetOperators(): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_OPERATOR, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getOperators($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetOperators(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_OPERATOR, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getOperators($queryParams);
    }

    public function testGetOperator(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_OPERATOR . '/' . $this->testOperatorId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new OperatorData)->getResponse()),
            $request
        );

        $getOperatorTypeSuccessfulResponse = $this->apiClient->getOperator($this->testOperatorId);
        self::assertSame($response->reveal(), $getOperatorTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetOperator(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_OPERATOR . '/' . $this->testOperatorId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getOperator($this->testOperatorId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetOperator(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_OPERATOR . '/' . $this->testOperatorId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getOperator($this->testOperatorId);
    }

    public function testPostOperator(): void
    {
        $ticketData = new OperatorData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_OPERATOR, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($ticketData->getResponse()),
            $request
        );

        $postOperatorResponse = $this->apiClient->postOperator([]);
        self::assertSame($response->reveal(), $postOperatorResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testPostUnsuccessfulOperator(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_OPERATOR, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postOperator([]);
    }

    public function testHttpExceptionPostOperator(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_OPERATOR, [], []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->postOperator([]);
    }

    public function testUpdateOperator(): void
    {
        $userData = new OperatorData;
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_OPERATOR . '/' . $this->testOperatorId,
            [],
            $userData->getArrayData()
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($userData->getResponse()),
            $request
        );

        $updateOperatorTypeSuccessfulResponse = $this->apiClient->putOperator($this->testOperatorId, $userData->getArrayData());
        self::assertSame($response->reveal(), $updateOperatorTypeSuccessfulResponse);
    }

    public function testHttpExceptionUpdateOperator(): void
    {
        $userData = new OperatorData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_OPERATOR . '/' . $this->testOperatorId,
            [],
            $userData->getArrayData()
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->putOperator($this->testOperatorId, $userData->getArrayData());
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulUpdateOperator(int $statusCode, string $responseBody): void
    {
        $userData = new OperatorData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_OPERATOR . '/' . $this->testOperatorId,
            [],
            $userData->getArrayData()
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->putOperator($this->testOperatorId, $userData->getArrayData());
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
