<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Translation;

class CategoryTranslation extends Translation
{
    /** @var array<string,string> */
    protected $casts = [
        'category_id' => 'int',
        'name'        => 'string',
        'slug'        => 'string',
    ];
}
