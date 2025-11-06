<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $author_id
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $text
 * @property int[] $category
 * @property string[] $tag
 * @property bool $published
 * @property int $published_at
 * @property bool $protected
 * @property bool $pinned
 */
class CreateArticle extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'author_id'    => 'int',
        'title'        => 'string',
        'slug'         => 'string',
        'excerpt'      => 'string',
        'text'         => 'string',
        'category'     => 'array',
        'tag'          => 'array',
        'published'    => 'bool',
        'published_at' => 'int',
        'protected'    => 'bool',
        'pinned'       => 'bool',
    ];
}
