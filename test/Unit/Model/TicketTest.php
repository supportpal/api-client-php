<?php


namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket;

class TicketTest extends BaseModelTestCase
{

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return  [
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

    /**
     * @inheritDoc
     */
    protected function getInvalidTypesData(): array
    {
        return [
            'text' => new \stdClass,
        ];
    }
}
