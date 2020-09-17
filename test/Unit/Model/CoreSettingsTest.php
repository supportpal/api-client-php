<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\CoreSettingsData;

class CoreSettingsTest extends BaseModelTestCase
{

    const CORE_SETTINGS_DATA = CoreSettingsData::CORE_SETTINGS_DATA;

    /**
     * @inheritDoc
     */
    protected function getInvalidTypesData(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new CoreSettings;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::CORE_SETTINGS_DATA;
    }
}
