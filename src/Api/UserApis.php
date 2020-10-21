<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\User\CustomFieldApis;
use SupportPal\ApiClient\Api\User\UserGroupApis;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\User\User;

use function array_map;

/**
 * Trait UserApis, includes all related ApiCalls pre and post processing related to Users
 * @package SupportPal\ApiClient\Api\Core
 */
trait UserApis
{
    use CustomFieldApis;
    use UserGroupApis;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getUsers(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getUsers($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createUser'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     * @return User
     */
    private function createUser(array $data): User
    {
        /** @var User $model */
        $model = $this->getModelCollectionFactory()->create(User::class, $data);

        return $model;
    }
}
