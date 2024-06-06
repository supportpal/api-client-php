<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Model\Ticket\Request\UpdateTicket;
use SupportPal\ApiClient\Model\Ticket\Ticket;

use function array_map;

trait Tickets
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getTickets(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getTickets($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createTicketModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getTicket(int $ticketId): Ticket
    {
        $response = $this->getApiClient()->getTicket($ticketId);

        return $this->createTicketModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createTicket(CreateTicket $data): Ticket
    {
        $response = $this->getApiClient()->postTicket($data->toArray());

        return $this->createTicketModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws InvalidArgumentException
     * @throws HttpResponseException
     */
    public function updateTicket(int $id, UpdateTicket $data): Ticket
    {
        $response = $this->getApiClient()->putTicket($id, $data->toArray());

        return $this->createTicketModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteTicket(int $id): bool
    {
        $response = $this->getApiClient()->deleteTicket($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createTicketModel(array $data): Ticket
    {
        return new Ticket($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
