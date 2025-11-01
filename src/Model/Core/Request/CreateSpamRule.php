<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core\Request;

use SupportPal\ApiClient\Model\Model;

/**
 * @property string $text
 * @property int $type
 * @property bool $event_message
 * @property bool $event_comment
 */
class CreateSpamRule extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'text'          => 'string',
        'type'          => 'int',
        'event_message' => 'bool',
        'event_comment' => 'bool',
    ];
}
