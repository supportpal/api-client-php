<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Attachment;

trait AttachmentApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getTicketAttachments(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getTicketAttachments($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createAttachment'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $attachmentId
     * @return Attachment
     * @throws HttpResponseException
     */
    public function getTicketAttachment(int $attachmentId): Attachment
    {
        $response = $this->getApiClient()->getTicketAttachment($attachmentId);

        return $this->createAttachment($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return Attachment
     */
    private function createAttachment(array $data): Attachment
    {
        /** @var Attachment $model */
        $model = $this->getModelCollectionFactory()->create(Attachment::class, $data);

        return $model;
    }
}
