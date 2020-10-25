<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Tag as SelfServiceTagAlias;

use function array_map;

/**
 * Trait TagApis, includes all related ApiCalls pre and post processing to Tags
 * @package SupportPal\ApiClient\Api\SelfService
 */
trait TagApis
{
    use ApiAware;

    /**
     * @param int $tagId
     * @return SelfServiceTagAlias
     * @throws HttpResponseException
     */
    public function getTag(int $tagId): SelfServiceTagAlias
    {
        $response = $this->getApiClient()->getTag($tagId);

        return $this->createTag($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function getTags(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getTags($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createTag'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     * @return SelfServiceTagAlias
     */
    private function createTag(array $data): SelfServiceTagAlias
    {
        /** @var SelfServiceTagAlias $model */
        $model = $this->getModelCollectionFactory()->create(SelfServiceTagAlias::class, $data);

        return $model;
    }

    abstract protected function getApiClient(): SelfServiceApiClient;
}
