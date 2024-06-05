<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\User\UserCustomField;

use function array_map;

trait UserCustomFields
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getUserCustomFields(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getUserCustomFields($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createUserCustomFieldModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getUserCustomField(int $id): UserCustomField
    {
        $response = $this->getApiClient()->getUserCustomField($id);

        return $this->createUserCustomFieldModel($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createUserCustomFieldModel(array $data): UserCustomField
    {
        return new UserCustomField($data);
    }

    abstract protected function getApiClient(): UserClient;
}
