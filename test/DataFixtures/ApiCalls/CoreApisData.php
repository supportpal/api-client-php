<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\IpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\LanguageData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateIpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateSpamRuleData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateWhitelistedIpData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\UpdateIpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\UpdateSpamRuleData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\UpdateWhitelistedIpData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\SpamRuleData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\WhitelistedIpData;

class CoreApisData
{
    /**
     * @return array<string, mixed>
     */
    public function getApiCalls(): array
    {
        $brandData = new BrandData;
        $ipBanData = new IpBanData;
        $whitelistedIpData = new WhitelistedIpData;
        $spamRuleData = new SpamRuleData;

        return [
            // Brands
            'getBrands' => [$brandData->getAllResponse(), []],
            'getBrand' => [$brandData->getResponse(), [1]],
            // IP Bans
            'getIpBans' => [$ipBanData->getAllResponse(), []],
            'getIpBan' => [$ipBanData->getResponse(), [1]],
            // IP Whitelist
            'getWhitelistedIps' => [$whitelistedIpData->getAllResponse(), []],
            'getWhitelistedIp' => [$whitelistedIpData->getResponse(), [1]],
            // Languages
            'getLanguages' => [(new LanguageData)->getResponse(), []],
            // General Settings
            'getSettings' => [(new CoreSettingsData)->getResponse(), []],
            // Spam Rules
            'getSpamRules' => [$spamRuleData->getAllResponse(), []],
            'getSpamRule' => [$spamRuleData->getResponse(), [1]],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function postApiCalls(): array
    {
        $ipBanData = new CreateIpBanData;
        $whitelistedIpData = new CreateWhitelistedIpData;
        $spamRuleData = new CreateSpamRuleData;

        return [
            'createIpBan' => [$ipBanData->getFilledInstance(), $ipBanData->getResponse()],
            'createWhitelistedIp' => [$whitelistedIpData->getFilledInstance(), $whitelistedIpData->getResponse()],
            'createSpamRule' => [$spamRuleData->getFilledInstance(), $spamRuleData->getResponse()],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function putApiCalls(): array
    {
        $ipBanData = new UpdateIpBanData;
        $whitelistedIpData = new UpdateWhitelistedIpData;
        $spamRuleData = new UpdateSpamRuleData;

        return [
            'updateIpBan' => [1, $ipBanData->getFilledInstance(), $ipBanData->getResponse()],
            'updateWhitelistedIp' => [1, $whitelistedIpData->getFilledInstance(), $whitelistedIpData->getResponse()],
            'updateSpamRule' => [1, $spamRuleData->getFilledInstance(), $spamRuleData->getResponse()],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function deleteApiCalls(): array
    {
        return [
            'deleteIpBan' => 1,
            'deleteWhitelistedIp' => 1,
            'deleteSpamRule' => 1,
        ];
    }
}
