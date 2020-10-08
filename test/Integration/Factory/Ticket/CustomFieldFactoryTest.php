<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\CustomFieldFactory;
use SupportPal\ApiClient\Model\Ticket\CustomField;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\CustomFieldData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class CustomFieldFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return CustomField::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return CustomFieldData::CUSTOM_FIELD_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return CustomField::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(CustomFieldFactory::class);

        return $modelFactory;
    }
}
