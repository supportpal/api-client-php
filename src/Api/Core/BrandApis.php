<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\CoreApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Core\Brand;

use function array_map;

trait BrandApis
{
    use ApiAware;

    /**
     * @param int $brandId
     * @return Brand
     * @throws HttpResponseException
     */
    public function getBrand(int $brandId): Brand
    {
        $response = $this->getApiClient()->getBrand($brandId);

        return $this->createBrand($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getBrands(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getBrands($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createBrand'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     * @return Brand
     */
    private function createBrand(array $data): Brand
    {
        /** @var Brand $model */
        $model = $this->getModelCollectionFactory()->create(Brand::class, $data);

        return $model;
    }

    abstract protected function getApiClient(): CoreApiClient;
}
