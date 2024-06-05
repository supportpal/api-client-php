<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\ApiClient;

use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\SettingsData;
use SupportPal\ApiClient\Tests\Integration\ApiClientTest;

class CoreApisTest extends ApiClientTest
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        $brandData = new BrandData;

        return [
            'getSettings' => [ (new SettingsData)->getResponse(), []],
            'getBrands' => [$brandData->getAllResponse(), [[]]],
            'getBrand' => [$brandData->getResponse(), [1]],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getPostEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getPutEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientClass()
    {
        return CoreClient::class;
    }
}
