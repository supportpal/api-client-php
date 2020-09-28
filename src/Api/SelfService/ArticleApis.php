<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Article;

trait ArticleApis
{
    use ApiAware;

    /**
     * @param int $articleId
     * @param array<mixed> $queryParameters
     * @return Article
     * @throws HttpResponseException
     */
    public function getArticle(int $articleId, array $queryParameters = []): Article
    {
        $response = $this->getApiClient()->getArticle($articleId, $queryParameters);

        return $this->createArticle($this->decodeBody($response)['data']);
    }

    /**
     * @param string $term
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function getArticlesByTerm(string $term, array $queryParameters = []): Collection
    {
        $queryParameters['term'] = $term;
        $response = $this->getApiClient()->getArticlesByTerm($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createArticle'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'] ?? count($models), $models);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function getArticles(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getArticles($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createArticle'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'] ?? count($models), $models);
    }

    /**
     * @param array<mixed> $data
     * @return Article
     */
    private function createArticle(array $data): Article
    {
        /** @var Article $model */
        $model = $this->getModelCollectionFactory()->create(Article::class, $data);

        return $model;
    }
}
