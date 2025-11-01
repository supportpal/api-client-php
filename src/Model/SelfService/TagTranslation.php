<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $tag_id
 * @property string $name
 * @property string $slug
 */
class TagTranslation extends Translation
{
    /** @var array<string, string> */
    protected $casts = [
        'id'     => 'int',
        'tag_id' => 'int',
        'name'   => 'string',
        'slug'   => 'string',
    ];
}
