<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core\Request;

use SupportPal\ApiClient\Model\Model;

class CreateSpamRule extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'text'          => 'string',
        'type'          => 'int',
        'event_message' => 'bool',
        'event_comment' => 'bool',
    ];
}
