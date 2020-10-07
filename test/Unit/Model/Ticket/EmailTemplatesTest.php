<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\EmailTemplates;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\EmailTemplatesData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class EmailTemplatesTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket
 * @covers \SupportPal\ApiClient\Model\Ticket\EmailTemplates
 */
class EmailTemplatesTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return EmailTemplatesData::EMAIL_TEMPLATES_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new EmailTemplates;
    }
}
