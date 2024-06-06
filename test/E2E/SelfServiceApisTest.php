<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use Exception;
use SupportPal\ApiClient\Api\SelfServiceApi;
use SupportPal\ApiClient\Dictionary\ApiDictionary;

class SelfServiceApisTest extends BaseTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetAllEndpoints(): array
    {
        return [
            ApiDictionary::SELF_SERVICE_ARTICLE      => 'getArticles',
            ApiDictionary::SELF_SERVICE_ATTACHMENT   => 'getAttachments',
            ApiDictionary::SELF_SERVICE_CATEGORY     => 'getCategories',
            ApiDictionary::SELF_SERVICE_COMMENT      => 'getComments',
            ApiDictionary::SELF_SERVICE_TAG          => 'getTags',
            ApiDictionary::SELF_SERVICE_ARTICLE_TYPE => 'getTypes',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetOneEndpoints(): array
    {
        return [
            ApiDictionary::SELF_SERVICE_ARTICLE      => 'getArticle',
            ApiDictionary::SELF_SERVICE_ATTACHMENT   => 'getAttachment',
            ApiDictionary::SELF_SERVICE_CATEGORY     => 'getCategory',
            ApiDictionary::SELF_SERVICE_COMMENT      => 'getComment',
            ApiDictionary::SELF_SERVICE_TAG          => 'getTag',
            ApiDictionary::SELF_SERVICE_ARTICLE_TYPE => 'getType',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [];
    }

    public function testGetSelfServiceSettings(): void
    {
        $this->settingsTestCase(ApiDictionary::SELF_SERVICE_SETTINGS, 'getSettings');
    }

    /**
     * @return SelfServiceApi
     * @throws Exception
     */
    protected function getApi(): SelfServiceApi
    {
        return $this->getSupportPal()->getSelfServiceApi();
    }
}
