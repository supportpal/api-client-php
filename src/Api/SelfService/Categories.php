<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Category;

use function array_map;

trait Categories
{
    /**
     * @throws HttpResponseException
     */
    public function getCategory(int $categoryId): Category
    {
        $response = $this->getApiClient()->getCategory($categoryId);

        return $this->createCategory($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getCategories(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getCategories($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createCategory'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     */
    private function createCategory(array $data): Category
    {
        return new Category($data);
    }

    abstract protected function getApiClient(): SelfServiceClient;
}
