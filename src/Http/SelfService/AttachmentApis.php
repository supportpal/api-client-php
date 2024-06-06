<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\SelfService;

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
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ATTACHMENT, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getAttachment(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_ATTACHMENT . '/' .  $id, []);
    }

    /**
     * @throws HttpResponseException
     */
    public function downloadAttachment(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create(
            'GET',
            sprintf(ApiDictionary::SELF_SERVICE_ATTACHMENT_DOWNLOAD, $id)
        );

        return $this->sendDownloadRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postAttachment(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::SELF_SERVICE_ATTACHMENT, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteAttachment(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('DELETE', ApiDictionary::SELF_SERVICE_ATTACHMENT . '/' . $id);

        return $this->sendRequest($request);
    }
}
