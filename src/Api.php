<?php declare(strict_types = 1);

namespace SupportPal\ApiClient;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Api\CoreApis;
use SupportPal\ApiClient\Api\SelfServiceApis;
use SupportPal\ApiClient\Api\UserApis;
use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

class Api
{
    use SelfServiceApis;
    use CoreApis;
    use UserApis;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var string
     */
    private $formatType;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    /**
     * @var DecoderInterface
     */
    private $decoder;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    public function __construct(
        SerializerInterface $serializer,
        ApiClient $apiClient,
        ModelCollectionFactory $modelCollectionFactory,
        string $formatType,
        DecoderInterface $decoder,
        CollectionFactory $collectionFactory
    ) {
        $this->serializer = $serializer;
        $this->apiClient = $apiClient;
        $this->formatType = $formatType;
        $this->modelCollectionFactory = $modelCollectionFactory;
        $this->decoder = $decoder;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritDoc
     */
    protected function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClient(): ApiClient
    {
        return $this->apiClient;
    }

    /**
     * @inheritDoc
     */
    protected function getFormatType(): string
    {
        return $this->formatType;
    }

    /**
     * @inheritDoc
     */
    protected function getModelCollectionFactory(): ModelCollectionFactory
    {
        return $this->modelCollectionFactory;
    }

    /**
     * @inheritDoc
     */
    protected function getDecoder(): DecoderInterface
    {
        return $this->decoder;
    }

    /**
     * @param ResponseInterface $response
     * @return array<mixed>
     */
    protected function decodeBody(ResponseInterface $response): array
    {
        /** @var array<mixed> $body */
        $body = $this->getDecoder()->decode((string) $response->getBody(), $this->getFormatType());

        return $body;
    }

    protected function getCollectionFactory(): CollectionFactory
    {
        return $this->collectionFactory;
    }
}
