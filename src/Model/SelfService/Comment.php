<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\User;

/**
 * @property int $id
 * @property int $article_id
 * @property int $type_id
 * @property int $author_id
 * @property string $name
 * @property string $text
 * @property string $purified_text
 * @property int|null $parent_id
 * @property int|null $root_parent_id
 * @property int $rating
 * @property int $status
 * @property int $notify_reply
 * @property int $created_at
 * @property int $updated_at
 * @property int $deleted_at
 * @property User $author
 */
class Comment extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'             => 'int',
        'article_id'     => 'int',
        'type_id'        => 'int',
        'author_id'      => 'int',
        'name'           => 'string',
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
