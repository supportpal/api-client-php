<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Core\Brand;

use function array_map;

trait Brands
{
    /**
     * @throws HttpResponseException
     */
    public function getBrand(int $brandId): Brand
    {
        $response = $this->getApiClient()->getBrand($brandId);

        return $this->createBrand($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getBrands(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getBrands($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createBrand'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     */
    private function createBrand(array $data): Brand
    {
        return new Brand($data);
    }

    abstract protected function getApiClient(): CoreClient;
}
