<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use Psr\Http\Message\StreamInterface;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingIdentifierException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\SelfService\Attachment;
use SupportPal\ApiClient\Model\SelfService\Request\CreateAttachment;

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
        $models = array_map([ $this, 'createAttachmentModel' ], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getAttachment(int $id): Attachment
    {
        $response = $this->getApiClient()->getAttachment($id);

        return $this->createAttachmentModel($this->decodeBody($response)['data']);
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
     * @throws HttpResponseException
     */
    public function createAttachment(CreateAttachment $data): Attachment
    {
        $response = $this->getApiClient()->postAttachment($data->toArray());

        return $this->createAttachmentModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteAttachment(int $id): bool
    {
        $response = $this->getApiClient()->deleteAttachment($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createAttachmentModel(array $data): Attachment
    {
        return new Attachment($data);
    }

    abstract protected function getApiClient(): SelfServiceClient;
}
