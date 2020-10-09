<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\TicketFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class TicketFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\Ticket
 * @covers \SupportPal\ApiClient\Factory\Ticket\TicketFactory
 */
class TicketFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new Ticket)->fill(TicketData::TICKET_DATA);
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return Ticket::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return TicketData::TICKET_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Ticket::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new TicketFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }
}
