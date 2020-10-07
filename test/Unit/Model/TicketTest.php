<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Ticket;

/**
 * Class TicketTest
 * @package SupportPal\ApiClient\Tests\Unit\Model
 * @covers \SupportPal\ApiClient\Model\Ticket
 */
class TicketTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return [
            'text' => 'test'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Ticket;
    }
}
