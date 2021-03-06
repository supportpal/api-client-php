<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\UserApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\User\UserCustomField;

use function array_map;

trait CustomFieldApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getCustomFields(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getCustomFields($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createUserCustomField'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $customFieldId
     * @return UserCustomField
     * @throws HttpResponseException
     */
    public function getCustomField(int $customFieldId): UserCustomField
    {
        $response = $this->getApiClient()->getCustomField($customFieldId);

        return $this->createUserCustomField($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return UserCustomField
     */
    private function createUserCustomField(array $data): UserCustomField
    {
        /** @var UserCustomField $model */
        $model = $this->getModelCollectionFactory()->create(UserCustomField::class, $data);

        return $model;
    }

    abstract protected function getApiClient(): UserApiClient;
}
