<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Model;

class Tag extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'           => 'int',
        'name'         => 'string',
        'slug'         => 'string',
        'created_at'   => 'int',
        'updated_at'   => 'int',
        'translations' => 'array:' . TagTranslation::class,
    ];
}
