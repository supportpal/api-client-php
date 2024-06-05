<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\User\Group;

use function array_map;

trait OperatorGroups
{
        /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getOperatorGroups(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getOperatorGroups($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createGroupModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getOperatorGroup(int $userGroupId): Group
    {
        $response = $this->getApiClient()->getOperatorGroup($userGroupId);

        return $this->createGroupModel($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createGroupModel(array $data): Group
    {
        return new Group($data);
    }

    abstract protected function getApiClient(): UserClient;
}
