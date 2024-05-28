<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\User\Group;

use function array_map;

trait UserGroups
{
        /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getGroups(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getGroups($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createGroup'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getGroup(int $userGroupId): Group
    {
        $response = $this->getApiClient()->getGroup($userGroupId);

        return $this->createGroup($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return Group
     */
    private function createGroup(array $data): Group
    {
        return new Group($data);
    }

    abstract protected function getApiClient(): UserClient;
}
