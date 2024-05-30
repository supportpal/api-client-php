<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait StatusApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getStatuses(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_STATUS, $queryParameters);
    }

    /**
     * @param int $statusId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getStatus(int $statusId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_STATUS . '/' .  $statusId, []);
    }
}
