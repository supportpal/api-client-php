<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class CommentApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService
 * @covers \SupportPal\ApiClient\ApiClient\SelfService\CommentApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class CommentApisTest extends ApiClientTest
{
    /** @var SelfServiceApiClient */
    protected $apiClient;

    /** @var int */
    private $testCommentId = 1;

    public function testPostSelfServiceComment(): void
    {
        $commentData = new CommentData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($commentData->getResponse()),
            $request
        );
        $postCommentResponse = $this->apiClient->postComment([]);
        self::assertSame($response->reveal(), $postCommentResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulPostSelfServiceComment(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postComment([]);
    }

    public function testHttpExceptionPostSelfServiceComment(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->postComment([]);
    }

    public function testGetComments(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new CommentData)->getAllResponse()),
            $request
        );
        $getCommentsResponse = $this->apiClient->getComments($queryParams);
        self::assertSame($response->reveal(), $getCommentsResponse);
    }

    public function testHttpExceptionGetComments(): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getComments($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetComments(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getComments($queryParams);
    }

    public function testGetComment(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_COMMENT . '/' . $this->testCommentId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new CommentData)->getResponse()),
            $request
        );

        $getCommentTypeSuccessfulResponse = $this->apiClient->getComment($this->testCommentId);
        self::assertSame($response->reveal(), $getCommentTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetComment(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_COMMENT . '/' . $this->testCommentId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getComment($this->testCommentId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetComment(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_COMMENT . '/' . $this->testCommentId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getComment($this->testCommentId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return SelfServiceApiClient::class;
    }
}
