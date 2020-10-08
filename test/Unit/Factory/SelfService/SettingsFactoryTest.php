<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\SettingsFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class SettingsFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\SelfService
 * @covers \SupportPal\ApiClient\Factory\SelfService\SettingsFactory
 */
class SettingsFactoryTest extends BaseModelFactoryTestCase
{
    const SETTINGS_DATA = SettingsData::SETTINGS_DATA;

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new SettingsFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::SETTINGS_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return Settings::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new Settings)->fill(self::SETTINGS_DATA);
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Settings::class;
    }
}
