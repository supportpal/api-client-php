<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Model;

class Type extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'                => 'int',
        'brand_id'          => 'int',
        'name'              => 'string',
        'slug'              => 'string',
        'description'       => 'string',
        'order'             => 'int',
        'enabled'           => 'int',
        'protected'         => 'int',
        'internal'          => 'int',
        'content'           => 'int',
        'view'              => 'int',
        'icon'              => 'string',
        'article_ordering'  => 'int',
        'show_on_dashboard' => 'int',
        'external_link'     => 'string',
        'created_at'        => 'int',
        'updated_at'        => 'int',
        'translations'      => 'array:' . TypeTranslation::class,
        'brand'             => Brand::class,
    ];
}
