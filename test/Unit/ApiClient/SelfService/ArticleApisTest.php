<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

/**
 * Class ArticleApisTest
 * @package SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService
 * @covers \SupportPal\ApiClient\ApiClient\SelfService\ArticleApis
 * @covers \SupportPal\ApiClient\ApiClient
 */
class ArticleApisTest extends ApiClientTest
{
    /** @var SelfServiceApiClient */
    protected $apiClient;

    /** @var int */
    private $testArticleId = 1;

    public function testGetArticlesByTerm(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new ArticleData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getArticlesByTerm($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetArticlesByTerm(): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
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
        self::expectException(HttpResponseException::class);
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
            (string) json_encode((new ArticleData)->getResponse()),
            $request
        );

        $getArticleTypeSuccessfulResponse = $this->apiClient->getArticle($this->testArticleId, []);
        self::assertSame($response->reveal(), $getArticleTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetArticle(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getArticle($this->testArticleId, []);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetArticle(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
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
            (string) json_encode((new ArticleData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getArticles($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetArticles(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
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
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::SELF_SERVICE_ARTICLE, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getArticles($queryParams);
    }

    public function testGetRelatedArticles(): void
    {
        $queryParams = [];
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE_RELATED,
            $queryParams,
            []
        );
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new ArticleData)->getAllResponse()),
            $request
        );
        $getTypeSuccessfulResponse = $this->apiClient->getRelatedArticles($queryParams);
        self::assertSame($response->reveal(), $getTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetRelatedArticles(): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE_RELATED,
            $queryParams,
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getRelatedArticles($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetRelatedArticles(int $statusCode, string $responseBody): void
    {
        $queryParams = [];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::SELF_SERVICE_ARTICLE_RELATED,
            $queryParams,
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getRelatedArticles($queryParams);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return SelfServiceApiClient::class;
    }
}
