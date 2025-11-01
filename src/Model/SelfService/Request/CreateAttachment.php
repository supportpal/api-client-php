<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $article_id
 * @property string $filename
 * @property string $contents
 */
class CreateAttachment extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'article_id' => 'int',
        'filename'   => 'string',
        'contents'   => 'string',
    ];
}
