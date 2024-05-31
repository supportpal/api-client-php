<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;

class ArticleApisTest extends BaseSelfServiceApiTest
{
    /** @var int */
    protected $testArticleId = 1;

    public function testGetArticles(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new ArticleData)->getAllResponse(), Article::class);

        $this->apiClient
            ->getArticles([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());
        $articles = $this->api->getArticles();
        self::assertEquals($output, $articles);
    }

    public function testGetArticlesByTerm(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new ArticleData)->getAllResponse(), Article::class);

        $this->apiClient
            ->getArticlesByTerm(['term' => 'test'])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $articles = $this->api->getArticlesByTerm('test');
        self::assertEquals($output, $articles);
    }

    public function testGetArticle(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new ArticleData)->getResponse(), Article::class);

        $this
            ->apiClient
            ->getArticle($this->testArticleId, [])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedArticle = $this->api->getArticle($this->testArticleId);
        self::assertEquals($output, $returnedArticle);
    }

    public function testGetRelatedArticles(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new ArticleData)->getAllResponse(), Article::class);

        $this->apiClient
            ->getRelatedArticles([
                'term' => 'test',
                'type_id' => 1,
            ])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $articles = $this->api->getRelatedArticles(1, 'test');
        self::assertEquals($output, $articles);
    }
}
