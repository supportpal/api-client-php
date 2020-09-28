<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\SelfService;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\SelfService\Tag as SelfServiceTagAlias;

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
     * @param array<mixed> $data
     * @return SelfServiceTagAlias
     */
    private function createTag(array $data): SelfServiceTagAlias
    {
        /** @var SelfServiceTagAlias $model */
        $model = $this->getModelCollectionFactory()->create(SelfServiceTagAlias::class, $data);

        return $model;
    }
}
