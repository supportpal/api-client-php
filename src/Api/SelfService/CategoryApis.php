<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Category;

/**
 * Trait CategoryApis, includes all related ApiCalls pre and post processing to categories
 * @package SupportPal\ApiClient\Api\SelfService
 */
trait CategoryApis
{
    use ApiAware;

    /**
     * @param int $categoryId
     * @return Category
     * @throws HttpResponseException
     */
    public function getCategory(int $categoryId): Category
    {
        $response = $this->getApiClient()->getCategory($categoryId);

        return $this->createCategory($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getCategories(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getCategories($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createCategory'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     * @return Category
     */
    private function createCategory(array $data): Category
    {
        /** @var Category $model */
        $model = $this->getModelCollectionFactory()->create(Category::class, $data);

        return $model;
    }
}
