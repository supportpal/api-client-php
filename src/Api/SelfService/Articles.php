<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Model\SelfService\Request\CreateArticle;
use SupportPal\ApiClient\Model\SelfService\Request\UpdateArticle;

use function array_map;

trait Articles
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function getArticles(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getArticles($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createArticleModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getArticle(int $id, array $queryParameters = []): Article
    {
        $response = $this->getApiClient()->getArticle($id, $queryParameters);

        return $this->createArticleModel($this->decodeBody($response)['data']);
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
        $models = array_map([$this, 'createArticleModel'], $body['data']);

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
        $models = array_map([$this, 'createArticleModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function createArticle(CreateArticle $data): Article
    {
        $response = $this->getApiClient()->postArticle($data->toArray());

        return $this->createArticleModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function updateArticle(int $id, UpdateArticle $data): Article
    {
        $response = $this->getApiClient()->putArticle($id, $data->toArray());

        return $this->createArticleModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteArticle(int $id): bool
    {
        $response = $this->getApiClient()->deleteArticle($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createArticleModel(array $data): Article
    {
        return new Article($data);
    }

    abstract protected function getApiClient(): SelfServiceClient;
}
