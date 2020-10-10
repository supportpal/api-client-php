<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\SettingsFactory;
use SupportPal\ApiClient\Model\SelfService\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class SettingsFactoryTest extends BaseModelFactoryTestCase
{
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
    protected function getModelData(): array
    {
        return SettingsData::DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Settings::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(SettingsFactory::class);

        return $modelFactory;
    }
}
