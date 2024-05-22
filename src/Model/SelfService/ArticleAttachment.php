<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Core\Upload;
use SupportPal\ApiClient\Model\Model;

class ArticleAttachment extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'upload_hash'   => 'string',
        'article_id'    => 'int',
        'locale'        => 'string',
        'original_name' => 'string',
        'created_at'    => 'int',
        'updated_at'    => 'int',
        'upload'        => Upload::class
    ];
}
