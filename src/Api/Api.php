<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\ApiClient\CoreApiClient;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\ApiClient\UserApiClient;
use SupportPal\ApiClient\Converter\ModelToArrayConverter;
use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

abstract class Api
{
    use ApiAware;

    /** @var UserApiClient|SelfServiceApiClient|TicketApiClient|CoreApiClient|ApiClient */
    protected $apiClient;

    /** @var ModelToArrayConverter */
    private $modelToArrayConverter;

    /** @var string */
    private $formatType;

    /** @var ModelCollectionFactory */
    private $modelCollectionFactory;

    /** @var DecoderInterface */
    private $decoder;

    /** @var CollectionFactory */
    private $collectionFactory;

    public function __construct(
        ModelToArrayConverter $modelToArrayConverter,
        ModelCollectionFactory $modelCollectionFactory,
        string $formatType,
        DecoderInterface $decoder,
        CollectionFactory $collectionFactory,
        ApiClient $apiClient
    ) {
        $this->modelToArrayConverter = $modelToArrayConverter;
        $this->formatType = $formatType;
        $this->modelCollectionFactory = $modelCollectionFactory;
        $this->decoder = $decoder;
        $this->collectionFactory = $collectionFactory;
        $this->apiClient = $apiClient;
    }

    /**
     * @inheritDoc
     */
    protected function getModelToArrayConverter(): ModelToArrayConverter
    {
        return $this->modelToArrayConverter;
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

    /**
     * @return CollectionFactory
     */
    protected function getCollectionFactory(): CollectionFactory
    {
        return $this->collectionFactory;
    }
}
