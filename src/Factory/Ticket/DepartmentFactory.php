<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\Ticket;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\Ticket\Department;

/**
 * Class DepartmentFactory
 * @package SupportPal\ApiClient\Factory\Ticket
 */
class DepartmentFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Department::class;
    }
}
