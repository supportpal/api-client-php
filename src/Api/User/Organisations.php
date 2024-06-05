<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\User\Organisation;
use SupportPal\ApiClient\Model\User\Request\CreateOrganisation;
use SupportPal\ApiClient\Model\User\Request\UpdateOrganisation;

use function array_map;

trait Organisations
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getOrganisations(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getOrganisations($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createOrganisationModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getOrganisation(int $id): Organisation
    {
        $response = $this->getApiClient()->getOrganisation($id);

        return $this->createOrganisationModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createOrganisation(CreateOrganisation $data): Organisation
    {
        $response = $this->getApiClient()->postOrganisation($data->toArray());

        return $this->createOrganisationModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function updateOrganisation(int $id, UpdateOrganisation $data): Organisation
    {
        $response = $this->getApiClient()->putOrganisation($id, $data->toArray());

        return $this->createOrganisationModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteOrganisation(int $id): bool
    {
        $response = $this->getApiClient()->deleteOrganisation($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createOrganisationModel(array $data): Organisation
    {
        return new Organisation($data);
    }

    abstract protected function getApiClient(): UserClient;
}
