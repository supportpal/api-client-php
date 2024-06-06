<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\SelfService;

use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Model\SelfService\Request\CreateArticle;
use SupportPal\ApiClient\Model\SelfService\Request\UpdateArticle;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\CreateArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request\UpdateArticleData;

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

    public function testCreateArticle(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new ArticleData)->getResponse(), Article::class);

        $createArticle = new CreateArticleData;
        /** @var CreateArticle $data */
        $data = $createArticle->getFilledInstance();

        $this->apiClient
            ->postArticle($createArticle::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->createArticle($data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testUpdateArticle(): void
    {
        [$output, $response] = $this->makeCommonExpectations((new ArticleData)->getResponse(), Article::class);

        $updateArticle = new UpdateArticleData;
        /** @var UpdateArticle $data */
        $data = $updateArticle->getFilledInstance();

        $this->apiClient
            ->putArticle(1, $updateArticle::DATA)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $returnedBrand = $this->api->updateArticle(1, $data);
        self::assertEquals($output, $returnedBrand);
    }

    public function testDeleteArticle(): void
    {
        $response = $this->makeSuccessResponse();

        $this->apiClient
            ->deleteArticle(1)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $apiResponse = $this->api->deleteArticle(1);
        self::assertTrue($apiResponse);
    }
}
