<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\Model;

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
