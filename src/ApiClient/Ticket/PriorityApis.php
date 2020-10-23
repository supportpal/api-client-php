<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait PriorityApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getPriorities(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_PRIORITY, $queryParameters);
    }

    /**
     * @param int $priorityId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getPriority(int $priorityId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_PRIORITY . '/' .  $priorityId, []);
    }
}
