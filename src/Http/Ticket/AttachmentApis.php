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
     * @throws HttpResponseException
     */
    public function getAttachments(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_ATTACHMENT, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getAttachment(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_ATTACHMENT . '/' .  $id, []);
    }

    /**
     * @throws HttpResponseException
     */
    public function downloadAttachment(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('GET', sprintf(ApiDictionary::TICKET_ATTACHMENT_DOWNLOAD, $id));

        return $this->sendDownloadRequest($request);
    }
}
