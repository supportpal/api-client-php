<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\User\CustomFieldApis;
use SupportPal\ApiClient\Api\User\UserGroupApis;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\User\Request\CreateUser;
use SupportPal\ApiClient\Model\User\User;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;

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
        if ($user->getId() === null) {
            throw new MissingIdentifierException('missing user identifier');
        }

        $response = $this->getApiClient()->updateUser($user->getId(), $data);

        return $this->createUser($this->decodeBody($response)['data']);
    }

    /**
     * @param CreateUser $createUser
     * @return User
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function postUser(CreateUser $createUser): User
    {
        try {
            $userArray = $this->getModelToArrayConverter()->convertOne($createUser);
        } catch (UninitializedPropertyException $exception) {
            throw new InvalidArgumentException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception->getPrevious()
            );
        }

        $response = $this->getApiClient()->postUser($userArray);

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
}
