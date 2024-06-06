<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\SelfService;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\UpdateArticleData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class ArticleApisTest extends ApiClientTest
{
    /** @var SelfServiceClient */
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

    public function testPostArticle(): void
    {
        $data = new CreateArticleData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_ARTICLE);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($data->getResponse()),
            $request
        );

        $postArticleResponse = $this->apiClient->postArticle([]);
        self::assertSame($response->reveal(), $postArticleResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testPostUnsuccessfulArticle(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_ARTICLE);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postArticle([]);
    }

    public function testHttpExceptionPostArticle(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::SELF_SERVICE_ARTICLE);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->postArticle([]);
    }

    public function testUpdateArticle(): void
    {
        $articleData = new UpdateArticleData;
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId,
            [],
            $articleData->getArrayData()
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($articleData->getResponse()),
            $request
        );

        $updateArticleTypeSuccessfulResponse = $this->apiClient->putArticle($this->testArticleId, $articleData->getArrayData());
        self::assertSame($response->reveal(), $updateArticleTypeSuccessfulResponse);
    }

    public function testHttpExceptionUpdateArticle(): void
    {
        $articleData = new ArticleData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId,
            [],
            $articleData->getArrayData()
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->putArticle($this->testArticleId, $articleData->getArrayData());
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulUpdateArticle(int $statusCode, string $responseBody): void
    {
        $articleData = new ArticleData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId,
            [],
            $articleData->getArrayData()
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->putArticle($this->testArticleId, $articleData->getArrayData());
    }

    public function testDeleteArticle(): void
    {
        $request = $this->requestCommonExpectations('DELETE', ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId);

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode(['status' => 'success']),
            $request
        );

        $articleDeleteResponse = $this->apiClient->deleteArticle($this->testArticleId);

        self::assertSame($response->reveal(), $articleDeleteResponse);
    }

    public function testHttpExceptionDeleteArticle(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('DELETE', ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->deleteArticle($this->testArticleId);
    }

    /**
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulDeleteArticle(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('DELETE', ApiDictionary::SELF_SERVICE_ARTICLE . '/' . $this->testArticleId);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->deleteArticle($this->testArticleId);
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return SelfServiceClient::class;
    }
}
