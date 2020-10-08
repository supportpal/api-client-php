<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Department\Department;

/**
 * Trait DepartmentApis, includes all related apis to departments
 * @package SupportPal\ApiClient\Api\Ticket
 */
trait DepartmentApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getDepartments(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getDepartments($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createDepartment'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     * @return Department
     */
    private function createDepartment(array $data): Department
    {
        /** @var Department $model */
        $model = $this->getModelCollectionFactory()->create(Department::class, $data);

        return $model;
    }
}
