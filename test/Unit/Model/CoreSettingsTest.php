<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\Core\CoreSettings;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;

/**
 * Class CoreSettingsTest
 * @package SupportPal\ApiClient\Tests\Unit\Model
 * @covers \SupportPal\ApiClient\Model\CoreSettings
 */
class CoreSettingsTest extends BaseModelTestCase
{
    const CORE_SETTINGS_DATA = CoreSettingsData::CORE_SETTINGS_DATA;

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
