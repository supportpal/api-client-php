<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class SettingsTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return SettingsData::SETTINGS_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Settings;
    }
}
