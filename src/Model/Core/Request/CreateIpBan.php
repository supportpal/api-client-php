<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core\Request;

use SupportPal\ApiClient\Model\Model;

/**
 * @property string $ip
 * @property string $reason
 * @property int $type
 * @property bool $event_user
 * @property bool $event_operator
 * @property bool $event_api
 * @property int $expiry_time
 */
class CreateIpBan extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'ip'             => 'string',
        'reason'         => 'string',
        'type'           => 'int',
        'event_user'     => 'bool',
        'event_operator' => 'bool',
        'event_api'      => 'bool',
        'expiry_time'    => 'int',
    ];
}
