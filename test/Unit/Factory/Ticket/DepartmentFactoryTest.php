<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\Ticket\DepartmentFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Department;
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
        return (new Department)->fill(DepartmentData::DEPARTMENT_DATA);
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return Department::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return DepartmentData::DEPARTMENT_DATA;
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
