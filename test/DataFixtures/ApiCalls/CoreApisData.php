<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\IpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\CreateIpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\Request\UpdateIpBanData;

class CoreApisData
{
    /**
     * @return array<string, mixed>
     */
    public function getApiCalls(): array
    {
        $brandData = new BrandData;
        $ipBanData = new IpBanData;

        return [
            // Brands
            'getBrands' => [$brandData->getAllResponse(), []],
            'getBrand' => [$brandData->getResponse(), [1]],
            // IP Bans
            'getIpBans' => [$ipBanData->getAllResponse(), []],
            'getIpBan' => [$ipBanData->getResponse(), [1]],
            // General Settings
            'getSettings' => [(new CoreSettingsData)->getResponse(), []],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function postApiCalls(): array
    {
        $ipBanData = new CreateIpBanData;

        return [
            // IP Bans
            'createIpBan' => [$ipBanData->getFilledInstance(), $ipBanData->getResponse()],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function putApiCalls(): array
    {
        $ipBanData = new UpdateIpBanData;

        return [
            // IP Bans
            'updateIpBan' => [1, $ipBanData->getFilledInstance(), $ipBanData->getResponse()],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function deleteApiCalls(): array
    {
        return [
            // IP Bans
            'deleteIpBan' => 1,
        ];
    }
}
