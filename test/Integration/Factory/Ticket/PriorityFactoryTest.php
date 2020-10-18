<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\PriorityFactory;
use SupportPal\ApiClient\Model\Ticket\Priority;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class PriorityFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new PriorityData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Priority::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(PriorityFactory::class);

        return $modelFactory;
    }
}
