<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property int $type_id
 * @property int|null $parent_id
 * @property string $name
 * @property string $slug
 * @property int $public
 * @property int $parent_public
 * @property int $created_at
 * @property int $updated_at
 * @property string $frontend_url
 * @property Type $type
 * @property CategoryTranslation[] $translations
 * @property int $pinned
 */
class Category extends Model
{
    /** @var array<string, string> */
    protected $casts = [
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
