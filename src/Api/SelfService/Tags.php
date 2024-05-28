<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\SelfService\Tag;

use function array_map;

trait Tags
{
    /**
     * @throws HttpResponseException
     */
    public function getTag(int $tagId): Tag
    {
        $response = $this->getApiClient()->getTag($tagId);

        return $this->createTag($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException|InvalidArgumentException
     */
    public function getTags(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getTags($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createTag'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     */
    private function createTag(array $data): Tag
    {
        return new Tag($data);
    }

    abstract protected function getApiClient(): SelfServiceClient;
}
