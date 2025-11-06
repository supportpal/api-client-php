<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $tag_id
 * @property string $name
 */
class TagTranslation extends Translation
{
    /** @var array<string, string> */
    protected $casts = [
        'id'      => 'int',
        'tag_id'  => 'int',
        'name'    => 'string',
    ];
}
