<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class SettingsTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\SelfService
 * @covers \SupportPal\ApiClient\Model\SelfService\Settings
 */
class SettingsTest extends BaseModelTestCase
{
    protected function getModelData(): array
    {
        return SettingsData::SETTINGS_DATA;
    }

    protected function getModel(): Model
    {
        return new Settings;
    }
}
