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
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTickets(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_TICKET, $queryParameters);
    }

    /**
     * @param int $ticketId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicket(int $ticketId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_TICKET . '/' .  $ticketId, []);
    }

    /**
     * @param int $ticketId
     * @param array<mixed> $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function putTicket(int $ticketId, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create(
            'PUT',
            ApiDictionary::TICKET_TICKET . '/' . $ticketId,
            [],
            $body
        );

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postTicket(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create(
            'POST',
            ApiDictionary::TICKET_TICKET,
            [],
            $body
        );

        return $this->sendRequest($request);
    }
}
