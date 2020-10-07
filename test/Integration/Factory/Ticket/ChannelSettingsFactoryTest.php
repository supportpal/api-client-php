<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Ticket;

use SupportPal\ApiClient\Model\Ticket\ChannelSettings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class ChannelSettingsFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return ChannelSettings::REQUIRED_FIELDS;
    }

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
    protected function getModel(): string
    {
        return ChannelSettings::class;
    }
}
