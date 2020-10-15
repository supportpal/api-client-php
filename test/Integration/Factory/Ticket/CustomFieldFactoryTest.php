<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\CustomFieldFactory;
use SupportPal\ApiClient\Model\Ticket\TicketCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class CustomFieldFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return TicketCustomFieldData::DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return TicketCustomField::class;
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
