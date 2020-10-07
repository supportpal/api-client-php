<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\ChannelSettingsFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\ChannelSettings;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

class ChannelSettingsFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new ChannelSettings)->fill(ChannelSettingsData::CHANNEL_SETTINGS_DATA);
    }

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

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new ChannelSettingsFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }
}
