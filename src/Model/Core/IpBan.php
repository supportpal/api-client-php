<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Model;

class IpBan extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'id'             => 'int',
        'ip'             => 'string',
        'reason'         => 'string',
        'event_user'     => 'bool',
        'event_operator' => 'bool',
        'event_api'      => 'bool',
        'type'           => 'int',
        'expiry'         => 'int',
        'created_at'     => 'int',
        'updated_at'     => 'int',
    ];
}
