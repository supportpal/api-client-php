<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Integration\ApiClient
 */
class CoreApisTest extends ApiClientTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        $brandData = new BrandData;

        return [
            'getCoreSettings' => [(new CoreSettingsData)->getResponse(), []],
            'getBrands' => [$brandData->getAllResponse(), [[]]],
            'getBrand' => [$brandData->getResponse(), [1]],
        ];
    }
}
