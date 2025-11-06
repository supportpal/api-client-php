<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $order
 * @property int $enabled
 * @property int $protected
 * @property int $internal
 * @property int $content
 * @property int $view
 * @property string $icon
 * @property int $article_ordering
 * @property int $show_on_dashboard
 * @property string|null $external_link
 * @property int $created_at
 * @property int $updated_at
 * @property TypeTranslation[] $translations
 * @property Brand $brand
 */
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
