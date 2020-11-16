<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

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
        $request = $this->getRequestFactory()->create(
            'GET',
            sprintf(ApiDictionary::TICKET_ATTACHMENT_DOWNLOAD, $attachmentId)
        );

        return $this->sendDownloadRequest($request);
    }
}
