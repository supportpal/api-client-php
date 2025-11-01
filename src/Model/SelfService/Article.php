<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $plain_text
 * @property string $text
 * @property string $purified_text
 * @property int $published
 * @property int $published_at
 * @property int $protected
 * @property int $pinned
 * @property int $created_at
 * @property int $updated_at
 * @property int $views
 * @property int $positive_rating
 * @property int $total_rating
 * @property ArticleTranslation[] $translations
 * @property Category[] $categories
 * @property Type[] $types
 * @property Attachment[] $attachments
 * @property Tag[] $tags
 */
class Article extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'            => 'int',
        'author_id'     => 'int',
        'title'         => 'string',
        'slug'          => 'string',
        'excerpt'       => 'string',
        'plain_text'    => 'string',
        'text'          => 'string',
        'purified_text' => 'string',
        'published'     => 'int',
        'published_at'  => 'int',
        'protected'     => 'int',
        'pinned'        => 'int',
        'created_at'    => 'int',
        'updated_at'    => 'int',
        'views'         => 'int',
        'positive_rating' => 'int',
        'total_rating'  => 'int',
        'translations'  => 'array:' . ArticleTranslation::class,
        'categories'    => 'array:' . Category::class,
        'types'         => 'array:' . Type::class,
        'attachments'   => 'array:' . Attachment::class,
        'tags'          => 'array:' . Tag::class,
    ];
}
