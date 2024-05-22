<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\UserApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Model\User\User;

use function array_map;

trait UserApis
{
    use ApiAware;

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
     * @param int $userId
     * @return User
     * @throws HttpResponseException
     */
    public function getUser(int $userId): User
    {
        $response = $this->getApiClient()->getUser($userId);

        return $this->createUser($this->decodeBody($response)['data']);
    }

    /**
     * @param User $user
     * @param array<mixed> $data
     * @return User
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
     * @param CreateUser $createUser
     * @return User
     * @throws HttpResponseException
     */
    public function postUser(CreateUser $createUser): User
    {
        $response = $this->getApiClient()->postUser($createUser->toArray());

        return $this->createUser($this->decodeBody($response)['data']);
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

    abstract protected function getApiClient(): UserApiClient;
}
