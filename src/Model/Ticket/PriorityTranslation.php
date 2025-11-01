<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $priority_id
 * @property string $name
 */
class PriorityTranslation extends Translation
{
    /** @var array<string,string> */
    protected $casts = [
        'id'          => 'int',
        'priority_id' => 'int',
        'name'        => 'string',
    ];
}
