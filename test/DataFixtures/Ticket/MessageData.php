<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

class MessageData
{
    public const MESSAGE_DATA = [
        'id' => 60,
        'ticket_id' => 1,
        'channel_id' => 3,
        'user_id' => 1,
        'user_name' => 'test test',
        'user_ip_address' => null,
        'by' => 0,
        'type' => 2,
        'excerpt' => 'forward',
        'text' => 'forward',
        'purified_text' => 'forward',
        'is_draft' => 0,
        'social_id' => null,
        'created_at' => 1598534452,
        'updated_at' => 1598534452
    ];
}
