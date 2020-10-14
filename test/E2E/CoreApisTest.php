<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\E2E;

use SupportPal\ApiClient\Dictionary\ApiDictionary;

class CoreApisTest extends BaseTestCase
{
    /**
     * @inheritDoc
     */
    protected function getGetAllEndpoints(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getGetByIdEndpoints(): array
    {
        return [];
    }

    public function testCoreSettings(): void
    {
        $this->settingsTestCase(ApiDictionary::CORE_SETTINGS, 'getCoreSettings');
    }
}
