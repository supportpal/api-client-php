<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait AttachmentApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicketAttachments(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_ATTACHMENT, $queryParameters);
    }

    /**
     * @param int $attachmentId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicketAttachment(int $attachmentId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_ATTACHMENT . '/' .  $attachmentId, []);
    }
}
