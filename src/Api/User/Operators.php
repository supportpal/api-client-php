<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\User;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\User\Operator;
use SupportPal\ApiClient\Model\User\Request\CreateOperator;
use SupportPal\ApiClient\Model\User\Request\UpdateOperator;

use function array_map;

trait Operators
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getOperators(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getOperators($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createOperatorModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getOperator(int $id): Operator
    {
        $response = $this->getApiClient()->getOperator($id);

        return $this->createOperatorModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createOperator(CreateOperator $data): Operator
    {
        $response = $this->getApiClient()->postOperator($data->toArray());

        return $this->createOperatorModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function updateOperator(int $id, UpdateOperator $data): Operator
    {
        $response = $this->getApiClient()->putOperator($id, $data->toArray());

        return $this->createOperatorModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteOperator(int $id): bool
    {
        $response = $this->getApiClient()->deleteOperator($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createOperatorModel(array $data): Operator
    {
        return new Operator($data);
    }

    abstract protected function getApiClient(): UserClient;
}
