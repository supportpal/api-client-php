<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\Ticket;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Ticket\Status;

class StatusFactory extends ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Status::class;
    }
}
