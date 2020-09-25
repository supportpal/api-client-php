<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\SelfService\Category;

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

        return $this->createCategory($this->decodeBody($response));
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Category[]
     * @throws HttpResponseException
     */
    public function getCategories(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getCategories($queryParameters);

        return array_map([$this, 'createCategory'], $this->decodeBody($response));
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
