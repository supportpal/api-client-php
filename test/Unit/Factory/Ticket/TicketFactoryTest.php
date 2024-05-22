<?php declare(strict_types=1);

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
        return (new TicketData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new TicketData)->getArrayData();
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
        return new TicketFactory;
    }
}
