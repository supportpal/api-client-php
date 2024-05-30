<?php declare(strict_types=1);

namespace Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\DepartmentEmail;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\EmailData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class DepartmentEmailTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new EmailData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new DepartmentEmail;
    }
}
