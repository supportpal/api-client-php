<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Model;

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
        'attachments'   => 'array:' . ArticleAttachment::class,
        'tags'          => 'array:' . Tag::class,
    ];
}
