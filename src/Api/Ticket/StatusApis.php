<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Status;

use function array_map;

trait StatusApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getStatuses(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getStatuses($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createStatus'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $statusId
     * @return Status
     * @throws HttpResponseException
     */
    public function getStatus(int $statusId): Status
    {
        $response = $this->getApiClient()->getStatus($statusId);

        return $this->createStatus($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return Status
     */
    private function createStatus(array $data): Status
    {
        /** @var Status $model */
        $model = $this->getModelCollectionFactory()->create(Status::class, $data);

        return $model;
    }

    abstract protected function getApiClient(): TicketApiClient;
}
