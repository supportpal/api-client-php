<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\User\Group;

use function array_map;

trait UserGroupApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getUserGroups(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getUserGroups($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createGroup'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $userGroupId
     * @return Group
     * @throws HttpResponseException
     */
    public function getUserGroup(int $userGroupId): Group
    {
        $response = $this->getApiClient()->getUserGroup($userGroupId);

        return $this->createGroup($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return Group
     */
    private function createGroup(array $data): Group
    {
        /** @var Group $model */
        $model = $this->getModelCollectionFactory()->create(Group::class, $data);

        return $model;
    }
}
