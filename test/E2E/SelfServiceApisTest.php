<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Dictionary\ApiDictionary;

class SelfServiceApisTest extends BaseTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetAllEndpoints(): array
    {
        return [
            ApiDictionary::SELF_SERVICE_ARTICLE_TYPE => 'getTypes',
            ApiDictionary::SELF_SERVICE_COMMENT => 'getComments',
            ApiDictionary::SELF_SERVICE_CATEGORY => 'getCategories',
            ApiDictionary::SELF_SERVICE_ARTICLE => 'getArticles',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetByIdEndpoints(): array
    {
        return [
            ApiDictionary::SELF_SERVICE_CATEGORY => 'getCategory',
            ApiDictionary::SELF_SERVICE_ARTICLE => 'getArticle',
            ApiDictionary::SELF_SERVICE_TAG => 'getTag',
        ];
    }

    public function testGetSelfServiceSettings(): void
    {
        $this->settingsTestCase(ApiDictionary::SELF_SERVICE_SETTINGS, 'getSelfServiceSettings');
    }
}
