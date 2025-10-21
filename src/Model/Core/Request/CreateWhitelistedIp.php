<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core\Request;

use SupportPal\ApiClient\Model\Model;

class CreateWhitelistedIp extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'ip'             => 'string',
        'description'    => 'string',
        'event_user'     => 'bool',
        'event_operator' => 'bool',
        'event_api'      => 'bool',
    ];
}
