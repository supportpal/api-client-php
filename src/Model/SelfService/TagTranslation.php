<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Translation;

class TagTranslation extends Translation
{
    /** @var array<string, string> */
    protected array $casts = [
        'id'     => 'int',
        'tag_id' => 'int',
        'name'   => 'string',
        'slug'   => 'string',
    ];
}
