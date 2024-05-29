<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Ticket\Status;

use function array_map;

trait Statuses
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getStatuses(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getStatuses($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createStatus'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getStatus(int $statusId): Status
    {
        $response = $this->getApiClient()->getStatus($statusId);

        return $this->createStatus($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createStatus(array $data): Status
    {
        return new Status($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
