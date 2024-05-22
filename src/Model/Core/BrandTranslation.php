<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Translation;

class BrandTranslation extends Translation
{
    /** @var array<string, string> */
    protected $casts = [
        'id'       => 'int',
        'name'     => 'string',
        'brand_id' => 'int',
    ];
}
