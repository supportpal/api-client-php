<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Model\User\Request\UpdateUser;
use SupportPal\ApiClient\Model\User\User;

use function array_map;

trait Users
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getUsers(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getUsers($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createUserModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getUser(int $id): User
    {
        $response = $this->getApiClient()->getUser($id);

        return $this->createUserModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createUser(CreateUser $data): User
    {
        $response = $this->getApiClient()->postUser($data->toArray());

        return $this->createUserModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function updateUser(int $id, UpdateUser $data): User
    {
        $response = $this->getApiClient()->putUser($id, $data->toArray());

        return $this->createUserModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteUser(int $id): bool
    {
        $response = $this->getApiClient()->deleteUser($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createUserModel(array $data): User
    {
        return new User($data);
    }

    abstract protected function getApiClient(): UserClient;
}
