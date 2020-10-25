<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\ApiCalls;

use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;

class CoreApisData
{
    /**
     * @return array[]
     */
    public function getApiCalls(): array
    {
        $brandData = new BrandData;

        return [
            'getSettings' => [(new CoreSettingsData)->getResponse(), []],
            'getBrands' => [$brandData->getAllResponse(), []],
            'getBrand' => [$brandData->getResponse(), [1]],
        ];
    }
}
