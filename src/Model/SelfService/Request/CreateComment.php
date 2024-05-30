<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\Model;

class CreateComment extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
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
