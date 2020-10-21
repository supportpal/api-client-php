<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\Ticket\AttachmentApis;
use SupportPal\ApiClient\Api\Ticket\ChannelSettingsApis;
use SupportPal\ApiClient\Api\Ticket\CustomFieldApis;
use SupportPal\ApiClient\Api\Ticket\DepartmentApis;
use SupportPal\ApiClient\Api\Ticket\MessageApis;
use SupportPal\ApiClient\Api\Ticket\PriorityApis;
use SupportPal\ApiClient\Api\Ticket\SettingsApis;
use SupportPal\ApiClient\Api\Ticket\StatusApis;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Ticket;

use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;
use function array_map;

/**
 * Contains all ApiCalls pre and post processing that falls under Tickets Module
 * @package SupportPal\ApiClient\Api
 */
trait TicketApis
{
    use AttachmentApis;
    use ChannelSettingsApis;
    use CustomFieldApis;
    use DepartmentApis;
    use PriorityApis;
    use MessageApis;
    use SettingsApis;
    use StatusApis;

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
     * @param array $data
     * @return Ticket
     * @throws InvalidArgumentException
     */
    public function updateTicket(Ticket $ticket, array $data): Ticket
    {
        if (null === $ticket->getId()) {
            throw new InvalidArgumentException('missing ticket identifier');
        }

        $response = $this->getApiClient()->updateTicket($ticket->getId(), $data);

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
}
