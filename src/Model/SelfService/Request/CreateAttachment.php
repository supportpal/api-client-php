<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\Model;

class CreateAttachment extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'article_id' => 'int',
        'filename'   => 'string',
        'contents'   => 'string',
    ];
}
