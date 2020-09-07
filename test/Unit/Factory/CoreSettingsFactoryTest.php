<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use SupportPal\ApiClient\Factory\CoreSettingsFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

class CoreSettingsFactoryTest extends BaseModelFactoryTestCase
{
    const CORE_SETTINGS_DATA = CoreSettingsData::CORE_SETTINGS_DATA;

    protected function getModelInstance(): Model
    {
        return new CoreSettings;
    }

    protected function getRequiredFields(): array
    {
        return CoreSettings::REQUIRED_FIELDS;
    }

    protected function getModelData(): array
    {
        return self::CORE_SETTINGS_DATA;
    }

    protected function getModel(): string
    {
        return CoreSettings::class;
    }

    protected function getModelFactory(): ModelFactory
    {
        return new CoreSettingsFactory(
            $this->getSerializer(),
            $this->format
        );
    }
}
