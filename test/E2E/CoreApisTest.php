<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateIpBanData;

class CoreApisTest extends BaseTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetAllEndpoints(): array
    {
        return [
            ApiDictionary::CORE_BRAND => 'getBrands',
            ApiDictionary::CORE_IP_BAN => 'getIpBans',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetOneEndpoints(): array
    {
        return [
            ApiDictionary::CORE_BRAND => 'getBrand',
            ApiDictionary::CORE_IP_BAN => 'getIpBan',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [
            ApiDictionary::CORE_IP_BAN => CreateIpBanData::DATA,
        ];
    }

    public function testCoreSettings(): void
    {
        $this->settingsTestCase(ApiDictionary::CORE_SETTINGS, 'getSettings');
    }

    protected function getApi(): CoreApi
    {
        return $this->getSupportPal()->getCoreApi();
    }
}
