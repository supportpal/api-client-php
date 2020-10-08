<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory\Ticket;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\Ticket\Status;

class StatusFactory extends BaseModelFactory
{
    /**
     * @return string
     */
    public function getModel(): string
    {
        return Status::class;
    }
}
