<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\User\OrganisationCustomField;

use function array_map;

trait OrganisationCustomFields
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getOrganisationCustomFields(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getOrganisationCustomFields($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createOrganisationCustomFieldModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getOrganisationCustomField(int $id): OrganisationCustomField
    {
        $response = $this->getApiClient()->getOrganisationCustomField($id);

        return $this->createOrganisationCustomFieldModel($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createOrganisationCustomFieldModel(array $data): OrganisationCustomField
    {
        return new OrganisationCustomField($data);
    }

    abstract protected function getApiClient(): UserClient;
}
