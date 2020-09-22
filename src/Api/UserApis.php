<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Model\User;

trait UserApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return User[]
     * @throws \SupportPal\ApiClient\Exception\HttpResponseException
     */
    public function getUsers(array $queryParameters = []): array
    {
        $response = $this->getApiClient()->getUsers($queryParameters);

        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType())['data'];

        return array_map([$this, 'createUser'], $body);
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
