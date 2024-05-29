<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
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
        $models = array_map([$this, 'createTicket'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getTicket(int $ticketId): Ticket
    {
        $response = $this->getApiClient()->getTicket($ticketId);

        return $this->createTicket($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @throws InvalidArgumentException
     * @throws HttpResponseException
     */
    public function updateTicket(Ticket $ticket, array $data): Ticket
    {
        if (! isset($ticket->id)) {
            throw new MissingIdentifierException('missing ticket identifier');
        }

        $response = $this->getApiClient()->updateTicket($ticket->id, $data);

        return $this->createTicket($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function postTicket(CreateTicket $createTicket): Ticket
    {
        $response = $this->getApiClient()->postTicket($createTicket->toArray());

        return $this->createTicket($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createTicket(array $data): Ticket
    {
        return new Ticket($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
