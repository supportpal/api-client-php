<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class ArticleApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers \SupportPal\ApiClient\Api\SelfService\ArticleApis
 * @covers \SupportPal\ApiClient\Api
 */
class ArticleApisTest extends ApiTest
{
    /**
     * @var int
     */
    protected $testArticleId = 1;

    public function testGetArticlesByTerm(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            ArticleData::GET_ARTICLES_SUCCESSFUL_RESPONSE,
            Article::class
        );

        $this
            ->apiClient
            ->getArticlesByTerm(['term' => 'test'])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $articles = $this->api->getArticlesByTerm('test', []);
        self::assertSame($expectedOutput, $articles);
    }

    public function testGetArticle(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            ArticleData::GET_ARTICLE_SUCCESSFUL_RESPONSE,
            Article::class
        );

        $this
            ->apiClient
            ->getArticle($this->testArticleId, [])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedArticle = $this->api->getArticle($this->testArticleId, []);
        self::assertSame($expectedOutput, $returnedArticle);
    }

    public function testGetArticles(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            ArticleData::GET_ARTICLES_SUCCESSFUL_RESPONSE,
            Article::class
        );

        $this
            ->apiClient
            ->getArticles([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $articles = $this->api->getArticles([]);
        self::assertSame($expectedOutput, $articles);
    }
}
