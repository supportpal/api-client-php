<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket\Request;

class CreateTicketData
{
    public const DATA = [
        'department' => 1,
        'status' => 1,
        'priority' => 1,
        'subject' => 'test',
        'text' => 'test',
    ];
}
