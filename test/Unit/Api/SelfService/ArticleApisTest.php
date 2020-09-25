<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

class ArticleApisTest extends ApiTest
{
    /**
     * @var int
     */
    protected $testArticleId = 1;

    public function testGetArticles(): void
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
}
