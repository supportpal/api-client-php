<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Api\CoreApi;
use SupportPal\ApiClient\Dictionary\ApiDictionary;

class CoreApisTest extends BaseTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetAllEndpoints(): array
    {
        return [
            ApiDictionary::CORE_BRAND => 'getBrands',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGetByIdEndpoints(): array
    {
        return [
            ApiDictionary::CORE_BRAND => 'getBrand',
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
