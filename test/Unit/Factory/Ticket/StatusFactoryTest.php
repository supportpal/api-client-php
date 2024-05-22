<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\StatusFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Status;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class StatusFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\Ticket
 * @covers \SupportPal\ApiClient\Factory\Ticket\StatusFactory
 */
class StatusFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new StatusData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new StatusData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Status::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new StatusFactory;
    }
}
