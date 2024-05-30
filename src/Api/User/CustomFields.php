<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\User\UserCustomField;

use function array_map;

trait CustomFields
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getCustomFields(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getCustomFields($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createUserCustomField'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getCustomField(int $customFieldId): UserCustomField
    {
        $response = $this->getApiClient()->getCustomField($customFieldId);

        return $this->createUserCustomField($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createUserCustomField(array $data): UserCustomField
    {
        return new UserCustomField($data);
    }

    abstract protected function getApiClient(): UserClient;
}
