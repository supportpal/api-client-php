<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Model\Ticket\Ticket;

use function array_map;

trait TicketApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getTickets(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getTickets($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createTicket'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $ticketId
     * @return Ticket
     * @throws HttpResponseException
     */
    public function getTicket(int $ticketId): Ticket
    {
        $response = $this->getApiClient()->getTicket($ticketId);

        return $this->createTicket($this->decodeBody($response)['data']);
    }

    /**
     * @param Ticket $ticket
     * @param array<mixed> $data
     * @return Ticket
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
     * @param CreateTicket $createTicket
     * @return Ticket
     * @throws HttpResponseException
     */
    public function postTicket(CreateTicket $createTicket): Ticket
    {
        $response = $this->getApiClient()->postTicket($createTicket->toArray());

        return $this->createTicket($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return Ticket
     */
    private function createTicket(array $data): Ticket
    {
        /** @var Ticket $model */
        $model = $this->getModelCollectionFactory()->create(Ticket::class, $data);

        return $model;
    }

    abstract protected function getApiClient(): TicketApiClient;
}
