<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateIpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateSpamRuleData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateWhitelistedIpData;

class CoreApisTest extends BaseTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetAllEndpoints(): array
    {
        return [
            ApiDictionary::CORE_BRAND        => 'getBrands',
            ApiDictionary::CORE_IP_BAN       => 'getIpBans',
            ApiDictionary::CORE_IP_WHITELIST => 'getWhitelistedIps',
            ApiDictionary::CORE_LANGUAGE     => 'getLanguages',
            ApiDictionary::CORE_SPAM_RULE    => 'getSpamRules',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetOneEndpoints(): array
    {
        return [
            ApiDictionary::CORE_BRAND        => 'getBrand',
            ApiDictionary::CORE_IP_BAN       => 'getIpBan',
            ApiDictionary::CORE_IP_WHITELIST => 'getWhitelistedIp',
            ApiDictionary::CORE_SPAM_RULE    => 'getSpamRule',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [
            ApiDictionary::CORE_IP_BAN       => CreateIpBanData::DATA,
            ApiDictionary::CORE_IP_WHITELIST => CreateWhitelistedIpData::DATA,
            ApiDictionary::CORE_SPAM_RULE    => CreateSpamRuleData::DATA,
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
