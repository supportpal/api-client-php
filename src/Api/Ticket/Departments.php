<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Ticket\Department;

use function array_map;

trait Departments
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getDepartments(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getDepartments($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createDepartmentModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getDepartment(int $id): Department
    {
        $response = $this->getApiClient()->getDepartment($id);

        return $this->createDepartmentModel($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createDepartmentModel(array $data): Department
    {
        return new Department($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
