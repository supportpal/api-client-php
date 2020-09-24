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
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return $this->createCategory($body);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Category[]
     * @throws HttpResponseException
     */
    public function getCategories(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getCategories($queryParameters);
        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createCategory'], $body);
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
