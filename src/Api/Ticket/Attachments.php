<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use Psr\Http\Message\StreamInterface;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection\Collection;
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
        $models = array_map([$this, 'createAttachment'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getAttachment(int $attachmentId): Attachment
    {
        $response = $this->getApiClient()->getAttachment($attachmentId);

        return $this->createAttachment($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     * @throws MissingIdentifierException
     */
    public function downloadAttachment(Attachment $attachment): StreamInterface
    {
        if (! isset($attachment->id)) {
            throw new MissingIdentifierException('missing attachment identifier');
        }

        return $this->getApiClient()->downloadAttachment($attachment->id)->getBody();
    }

    /**
     * @param array<mixed> $data
     */
    private function createAttachment(array $data): Attachment
    {
        return new Attachment($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
