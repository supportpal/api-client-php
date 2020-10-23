<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Priority;

use function array_map;

trait PriorityApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getPriorities(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getPriorities($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createPriority'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $priorityId
     * @return Priority
     * @throws HttpResponseException
     */
    public function getPriority(int $priorityId): Priority
    {
        $response = $this->getApiClient()->getPriority($priorityId);

        return $this->createPriority($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return Priority
     */
    private function createPriority(array $data): Priority
    {
        /** @var Priority $model */
        $model = $this->getModelCollectionFactory()->create(Priority::class, $data);

        return $model;
    }

    abstract protected function getApiClient(): TicketApiClient;
}
