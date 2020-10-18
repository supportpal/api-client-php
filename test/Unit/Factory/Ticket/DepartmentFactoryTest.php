<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\DepartmentFactory;
use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class DepartmentFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\Ticket
 * @covers \SupportPal\ApiClient\Factory\Ticket\DepartmentFactory
 */
class DepartmentFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new DepartmentData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new DepartmentData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Department::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new DepartmentFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }
}
