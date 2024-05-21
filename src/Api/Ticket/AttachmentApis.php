<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use Error;
use Psr\Http\Message\StreamInterface;
use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Attachment;
use TypeError;

use function array_map;
use function sprintf;

trait AttachmentApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getAttachments(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getAttachments($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createAttachment'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $attachmentId
     * @return Attachment
     * @throws HttpResponseException
     */
    public function getAttachment(int $attachmentId): Attachment
    {
        $response = $this->getApiClient()->getAttachment($attachmentId);

        return $this->createAttachment($this->decodeBody($response)['data']);
    }

    /**
     * @param Attachment $attachment
     * @return StreamInterface
     * @throws HttpResponseException
     * @throws MissingIdentifierException
     */
    public function downloadAttachment(Attachment $attachment): StreamInterface
    {
        try {
            $attachmentId = $attachment->getId();
        } catch (TypeError $typeError) {
            throw new MissingIdentifierException('missing attachment identifier');
        } catch (Error $error) {
            if ($error->getMessage() === sprintf('Typed property %s::$id must not be accessed before initialization', Attachment::class)) {
                throw new MissingIdentifierException('missing attachment identifier');
            }

            throw $error;
        }

        return $this->getApiClient()->downloadAttachment($attachmentId)->getBody();
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

    abstract protected function getApiClient(): TicketApiClient;
}
