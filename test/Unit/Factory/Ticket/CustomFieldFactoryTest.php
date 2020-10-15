<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\CustomFieldFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\TicketCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class CustomFieldFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\Ticket
 * @covers \SupportPal\ApiClient\Factory\Ticket\CustomFieldFactory
 */
class CustomFieldFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return TicketCustomFieldData::getFilledInstance();
    }

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
        return new CustomFieldFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }
}
