<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Type;

use function array_map;

trait Types
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getTypes(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getTypes($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createType'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getType(int $typeId): Type
    {
        $response = $this->getApiClient()->getType($typeId);

        return $this->createType($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createType(array $data): Type
    {
        return new Type($data);
    }

    abstract protected function getApiClient(): SelfServiceClient;
}
