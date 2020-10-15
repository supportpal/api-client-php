<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait StatusApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicketStatuses(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_STATUS, $queryParameters);
    }

    /**
     * @param int $statusId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicketStatus(int $statusId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_STATUS . '/' .  $statusId, []);
    }
}
