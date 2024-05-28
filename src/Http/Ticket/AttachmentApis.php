<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

use function sprintf;

trait AttachmentApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getAttachments(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_ATTACHMENT, $queryParameters);
    }

    /**
     * @param int $attachmentId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getAttachment(int $attachmentId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_ATTACHMENT . '/' .  $attachmentId, []);
    }

    /**
     * @param int $attachmentId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function downloadAttachment(int $attachmentId): ResponseInterface
    {
        $request = $this->getRequest()->create(
            'GET',
            sprintf(ApiDictionary::TICKET_ATTACHMENT_DOWNLOAD, $attachmentId)
        );

        return $this->sendDownloadRequest($request);
    }
}
