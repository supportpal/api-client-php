<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait TicketApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getTickets(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_TICKET, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getTicket(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_TICKET . '/' .  $id, []);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postTicket(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::TICKET_TICKET, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function putTicket(int $id, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('PUT', ApiDictionary::TICKET_TICKET . '/' . $id, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteTicket(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('DELETE', ApiDictionary::TICKET_TICKET . '/' . $id);

        return $this->sendRequest($request);
    }
}
