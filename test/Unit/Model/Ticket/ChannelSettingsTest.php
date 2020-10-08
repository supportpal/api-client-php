<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\ChannelSettings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class ChannelSettingsTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket
 * @covers \SupportPal\ApiClient\Model\Ticket\ChannelSettings
 */
class ChannelSettingsTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return ChannelSettingsData::CHANNEL_SETTINGS_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new ChannelSettings;
    }
}
