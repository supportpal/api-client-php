<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Api;

use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Integration\ApiTestCase;

/**
 * Class CoreApisTest
 * @package SupportPal\ApiClient\Tests\Integration\Api
 */
class CoreApisTest extends ApiTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetEndpoints(): array
    {
        return [
            'getCoreSettings' => [CoreSettingsData::getResponse(), []],
            'getBrands' => [BrandData::getAllResponse(), []],
            'getBrand' => [BrandData::getResponse(), [1]],
        ];
    }
}
