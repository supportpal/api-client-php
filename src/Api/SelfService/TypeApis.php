<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Type;

use function array_map;

/**
 * Trait TypeApis, includes all related ApiCalls pre and post processing to selfservice types
 * @package SupportPal\ApiClient\Api\SelfService
 */
trait TypeApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getTypes(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getTypes($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createType'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     * @return Type
     */
    private function createType(array $data): Type
    {
        /** @var Type $model */
        $model = $this->getModelCollectionFactory()->create(Type::class, $data);

        return $model;
    }
}
