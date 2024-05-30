<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\User;

class Message extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'id'              => 'int',
        'ticket_id'       => 'int',
        'channel_id'      => 'int',
        'user_id'         => 'int',
        'user_name'       => 'string',
        'user_ip_address' => 'string',
        'by'              => 'int',
        'type'            => 'int',
        'excerpt'         => 'string',
        'text'            => 'string',
        'purified_text'   => 'string',
        'is_draft'        => 'int',
        'social_id'       => 'string',
        'extra'           => Extra::class,
        'created_at'      => 'int',
        'updated_at'      => 'int',
        'attachments'     => 'array:' . Attachment::class,
        'user'            => User::class,
    ];
}
