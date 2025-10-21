<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Model;

class SpamRule extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'            => 'int',
        'text'          => 'string',
        'event_message' => 'bool',
        'event_comment' => 'bool',
        'type'          => 'int',
        'created_at'    => 'int',
        'updated_at'    => 'int',
    ];
}
