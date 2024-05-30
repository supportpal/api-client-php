<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;

class CreateMessage extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'ticket_id'            => 'int',
        'user_id'              => 'int',
        'user_ip_address'      => 'string',
        'message_type'         => 'int',
        'text'                 => 'string',
        'attachment'           => 'array',
        'cc'                   => 'array',
        'is_draft'             => 'bool',
        'send_user_email'      => 'bool',
        'send_operators_email' => 'bool',
        'created_at'           => 'int',
    ];
}
