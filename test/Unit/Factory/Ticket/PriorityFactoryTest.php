<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\PriorityFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Priority;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class PriorityFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\Ticket
 * @covers \SupportPal\ApiClient\Factory\Ticket\PriorityFactory
 */
class PriorityFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new PriorityData)->getFilledInstance();
    }

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
        return new PriorityFactory;
    }
}
