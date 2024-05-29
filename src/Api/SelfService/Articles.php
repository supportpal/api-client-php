<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\SelfService\Article;

use function array_map;

trait Articles
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getArticle(int $articleId, array $queryParameters = []): Article
    {
        $response = $this->getApiClient()->getArticle($articleId, $queryParameters);

        return $this->createArticle($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function getArticlesByTerm(string $term, array $queryParameters = []): Collection
    {
        $queryParameters['term'] = $term;
        $response = $this->getApiClient()->getArticlesByTerm($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createArticle'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function getArticles(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getArticles($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createArticle'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getRelatedArticles(int $typeId, string $term, array $queryParameters = []): Collection
    {
        $queryParameters['term'] = $term;
        $queryParameters['type_id'] = $typeId;

        $response = $this->getApiClient()->getRelatedArticles($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createArticle'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     */
    private function createArticle(array $data): Article
    {
        return new Article($data);
    }

    abstract protected function getApiClient(): SelfServiceClient;
}
