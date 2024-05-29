<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Model;

class Category extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'id'            => 'int',
        'type_id'       => 'int',
        'parent_id'     => 'int',
        'name'          => 'string',
        'slug'          => 'string',
        'public'        => 'int',
        'parent_public' => 'int',
        'created_at'    => 'int',
        'updated_at'    => 'int',
        'frontend_url'  => 'string',
        'type'          => Type::class,
        'translations'  => 'array:' . CategoryTranslation::class,
        'pinned'        => 'int'
    ];
}
