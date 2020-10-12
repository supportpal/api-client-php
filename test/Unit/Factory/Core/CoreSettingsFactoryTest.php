<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Core;

use SupportPal\ApiClient\Factory\Core\CoreSettingsFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Core\CoreSettings;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class CoreSettingsFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\Core\CoreSettingsFactory
 */
class CoreSettingsFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return CoreSettingsData::getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return CoreSettings::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return CoreSettingsData::DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return CoreSettings::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new CoreSettingsFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }
}
