<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Department;

use SupportPal\ApiClient\Model\Department\EmailTemplates;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\EmailTemplatesData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class EmailTemplatesTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket
 * @covers \SupportPal\ApiClient\Model\Department\EmailTemplates
 */
class EmailTemplatesTest extends BaseModelTestCase
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
        return new EmailTemplates;
    }
}
