<?php declare(strict_types=1);

namespace Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\DepartmentEmailTemplates;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\EmailTemplatesData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

class DepartmentEmailTemplatesTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new EmailTemplatesData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new DepartmentEmailTemplates;
    }
}
