<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\User;

/**
 * @property int $id
 * @property int $ticket_id
 * @property int $channel_id
 * @property int $user_id
 * @property string $user_name
 * @property string|null $user_ip_address
 * @property int $by
 * @property int $type
 * @property string $excerpt
 * @property string $text
 * @property string $purified_text
 * @property int $is_draft
 * @property string|null $social_id
 * @property Extra $extra
 * @property int $created_at
 * @property int $updated_at
 * @property Attachment[] $attachments
 * @property User $user
 */
class Message extends Model
{
    /** @var array<string, string> */
    protected $casts = [
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
