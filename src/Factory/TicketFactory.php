<?php


namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\Ticket;

class TicketFactory extends AbstractModelFactory implements ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Ticket::class;
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return [];
    }
}
