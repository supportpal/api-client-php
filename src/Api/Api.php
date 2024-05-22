<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\ApiClient\CoreApiClient;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\ApiClient\UserApiClient;
use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;

use function json_decode;

abstract class Api
{
    use ApiAware;

    /** @var UserApiClient|SelfServiceApiClient|TicketApiClient|CoreApiClient|ApiClient */
    protected $apiClient;

    /** @var ModelCollectionFactory */
    private $modelCollectionFactory;

    /** @var CollectionFactory */
    private $collectionFactory;

    public function __construct(
        ModelCollectionFactory $modelCollectionFactory,
        CollectionFactory $collectionFactory,
        ApiClient $apiClient
    ) {
        $this->modelCollectionFactory = $modelCollectionFactory;
        $this->collectionFactory = $collectionFactory;
        $this->apiClient = $apiClient;
    }

    /**
     * @inheritDoc
     */
    protected function getModelCollectionFactory(): ModelCollectionFactory
    {
        return $this->modelCollectionFactory;
    }

    /**
     * @param ResponseInterface $response
     * @return array<mixed>
     */
    protected function decodeBody(ResponseInterface $response): array
    {
        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @return CollectionFactory
     */
    protected function getCollectionFactory(): CollectionFactory
    {
        return $this->collectionFactory;
    }
}
