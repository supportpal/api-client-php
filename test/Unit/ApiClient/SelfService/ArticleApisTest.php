<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

class ArticleApisTest extends ApiClientTest
{
    /**
     * @var array<mixed>
     */
    private $getArticlesSuccessfulResponse = ArticleData::GET_ARTICLES_SUCCESSFUL_RESPONSE;

    /**
     * @var array<mixed>
     */
    private $getArticleTypeSuccessfulResponse = ArticleData::GET_ARTICLE_SUCCESSFUL_RESPONSE;

    /**
     * @var int
     */
    private $testArticleId = 1;

    public function testGetArticlesByTerm(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getArticlesSuccessfulResponse),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getArticlesByTerm($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetArticlesByTerm(): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getArticlesByTerm($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetArticlesByTerm(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getArticlesByTerm($queryParams);
    }

    public function testGetArticle(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getArticleTypeSuccessfulResponse),
            $request
        );

        $getArticleTypeSuccessfulResponse = $this->apiClient->getArticle($this->testArticleId, []);
        self::assertSame($response->reveal(), $getArticleTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetArticle(): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId,
            [],
            []
        );
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getArticle($this->testArticleId, []);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetArticle(int $statusCode, string $responseBody): void
    {
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getArticle($this->testArticleId, []);
    }

    public function testGetArticles(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($this->getArticlesSuccessfulResponse),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getArticles($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetArticles(): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE, $queryParams, []);
        $this->httpClient->sendRequest($request)->willThrow(HttpResponseException::class)->shouldBeCalled();
        $this->apiClient->getArticles($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetArticles(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        $this->expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getArticles($queryParams);
    }
}
