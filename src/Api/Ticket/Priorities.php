<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Priority;

use function array_map;

trait Priorities
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getPriorities(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getPriorities($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createPriority'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getPriority(int $priorityId): Priority
    {
        $response = $this->getApiClient()->getPriority($priorityId);

        return $this->createPriority($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createPriority(array $data): Priority
    {
        return new Priority($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
