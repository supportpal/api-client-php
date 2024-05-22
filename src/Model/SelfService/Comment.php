<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\User;

class Comment extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'             => 'int',
        'article_id'     => 'int',
        'type_id'        => 'int',
        'author_id'      => 'int',
        'text'           => 'string',
        'purified_text'  => 'string',
        'parent_id'      => 'int',
        'root_parent_id' => 'int',
        'rating'         => 'int',
        'status'         => 'int',
        'notify_reply'   => 'int',
        'created_at'     => 'int',
        'updated_at'     => 'int',
        'deleted_at'     => 'int',
        'author'         => User::class,
    ];
}
