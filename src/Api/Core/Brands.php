<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Core\Brand;

use function array_map;

trait Brands
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getBrands(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getBrands($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createBrandModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getBrand(int $id): Brand
    {
        $response = $this->getApiClient()->getBrand($id);

        return $this->createBrandModel($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createBrandModel(array $data): Brand
    {
        return new Brand($data);
    }

    abstract protected function getApiClient(): CoreClient;
}
