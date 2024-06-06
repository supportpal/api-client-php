<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use Psr\Http\Message\StreamInterface;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Ticket\Attachment;

use function array_map;

trait Attachments
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getAttachments(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getAttachments($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createAttachmentModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getAttachment(int $attachmentId): Attachment
    {
        $response = $this->getApiClient()->getAttachment($attachmentId);

        return $this->createAttachmentModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function downloadAttachment(int $id): StreamInterface
    {
        return $this->getApiClient()->downloadAttachment($id)->getBody();
    }

    /**
     * @param array<mixed> $data
     */
    private function createAttachmentModel(array $data): Attachment
    {
        return new Attachment($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
