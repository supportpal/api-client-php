<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\TicketFactory;
use SupportPal\ApiClient\Model\Ticket\Ticket;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class TicketFactoryTest extends BaseModelFactoryTestCase
{
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
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(TicketFactory::class);

        return $modelFactory;
    }
}
