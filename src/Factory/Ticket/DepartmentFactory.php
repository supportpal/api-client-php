<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Department\Department;

/**
 * Class DepartmentFactory
 * @package SupportPal\ApiClient\Factory\Ticket
 */
class DepartmentFactory extends ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Department::class;
    }
}
