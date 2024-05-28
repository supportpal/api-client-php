<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
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
        $models = array_map([$this, 'createUser'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getUser(int $userId): User
    {
        $response = $this->getApiClient()->getUser($userId);

        return $this->createUser($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function updateUser(User $user, array $data): User
    {
        if (! isset($user->id)) {
            throw new MissingIdentifierException('missing user identifier');
        }

        $response = $this->getApiClient()->updateUser($user->id, $data);

        return $this->createUser($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function postUser(CreateUser $createUser): User
    {
        $response = $this->getApiClient()->postUser($createUser->toArray());

        return $this->createUser($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createUser(array $data): User
    {
        return new User($data);
    }

    abstract protected function getApiClient(): UserClient;
}
