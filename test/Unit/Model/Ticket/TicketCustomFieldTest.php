<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\TicketCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class CustomFieldTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket
 * @covers \SupportPal\ApiClient\Model\Ticket\TicketCustomField
 * @covers \SupportPal\ApiClient\Model\Shared\CustomField
 */
class TicketCustomFieldTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new TicketCustomFieldData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new TicketCustomField;
    }
}
