<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class ArticleApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\SelfService
 * @covers \SupportPal\ApiClient\Api\SelfService\ArticleApis
 * @covers \SupportPal\ApiClient\Api\Api
 */
class ArticleApisTest extends ApiTest
{
    /** @var SelfServiceApi */
    protected $api;

    /** @var int */
    protected $testArticleId = 1;

    public function testGetArticlesByTerm(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new ArticleData)->getAllResponse(),
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
            (new ArticleData)->getResponse(),
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
            (new ArticleData)->getAllResponse(),
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

    public function testGetRelatedArticles(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new ArticleData)->getAllResponse(),
            Article::class
        );

        $this
            ->apiClient
            ->getRelatedArticles([
                'term' => 'test',
                'type_id' => 1,
            ])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $articles = $this->api->getRelatedArticles(1, 'test', []);
        self::assertSame($expectedOutput, $articles);
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return SelfServiceApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return SelfServiceApiClient::class;
    }
}
