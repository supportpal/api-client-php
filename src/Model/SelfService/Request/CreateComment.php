<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $article_id
 * @property int $type_id
 * @property int $parent_id
 * @property int $author_id
 * @property string $name
 * @property string $text
 * @property int $status
 * @property bool $notify_reply
 */
class CreateComment extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'article_id'   => 'int',
        'type_id'      => 'int',
        'parent_id'    => 'int',
        'author_id'    => 'int',
        'name'         => 'string',
        'text'         => 'string',
        'status'       => 'int',
        'notify_reply' => 'bool',
    ];
}
