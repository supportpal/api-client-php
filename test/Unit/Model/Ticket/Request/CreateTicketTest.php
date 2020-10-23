<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Request\CreateTicket;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request\CreateTicketData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class CreateTicketTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket\Request
 * @covers \SupportPal\ApiClient\Model\Ticket\Request\CreateTicket
 */
class CreateTicketTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new CreateTicketData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new CreateTicket;
    }
}
