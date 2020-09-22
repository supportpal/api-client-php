<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleTypeData;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

class SelfServiceApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $postCommentSuccessfulResponse = CommentData::POST_COMMENT_SUCCESSFUL_RESPONSE;

    /**
     * @var array<mixed>
     */
    private $getCommentsSuccessfulResponse = CommentData::GET_COMMENTS_SUCCESSFUL_RESPONSE;

    /**
     * @var array<mixed>
     */
    private $getArticleTypeSuccessfulResponse = ArticleTypeData::GET_ARTICLES_SUCCESSFUL_RESPONSE;

    public function testPostSelfServiceComment(): void
    {
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], '{test}');
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->postCommentSuccessfulResponse),
            $request
        );
        $postCommentResponse = $this->apiClient->postSelfServiceComment('{test}');
        self::assertSame($response->reveal(), $postCommentResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulPostSelfServiceComment(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], '{test}');
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postSelfServiceComment('{test}');
    }

    public function testHttpExceptionPostSelfServiceComment(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_COMMENT, [], '{test}');
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->postSelfServiceComment('{test}');
    }

    public function testGetComments(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, null);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getCommentsSuccessfulResponse),
            $request
        );
        $getCommentsResponse = $this->apiClient->getComments($queryParams);
        self::assertSame($response->reveal(), $getCommentsResponse);
    }

    public function testHttpExceptionGetComments(): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, null);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
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
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_COMMENT, $queryParams, null);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getComments($queryParams);
    }

    public function testGetArticleTypes(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_TYPE, $queryParams, null);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getArticleTypeSuccessfulResponse),
            $request
        );
        $getArticleTypeSuccessfulResponse = $this->apiClient->getArticleTypes($queryParams);
        self::assertSame($response->reveal(), $getArticleTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetArticleTypes(): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_TYPE, $queryParams, null);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getArticleTypes($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetArticleTypes(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_TYPE, $queryParams, null);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getArticleTypes($queryParams);
    }
}
