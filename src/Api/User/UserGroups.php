<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\User\Group;

use function array_map;

trait UserGroups
{
        /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getUserGroups(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getUserGroups($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createGroupModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getUserGroup(int $userGroupId): Group
    {
        $response = $this->getApiClient()->getUserGroup($userGroupId);

        return $this->createGroupModel($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    abstract private function createGroupModel(array $data): Group;

    abstract protected function getApiClient(): UserClient;
}
