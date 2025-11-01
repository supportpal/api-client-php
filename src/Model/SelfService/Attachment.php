<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Core\Upload;
use SupportPal\ApiClient\Model\Model;

/**
 * @property string $upload_hash
 * @property int $article_id
 * @property string|null $locale
 * @property string $original_name
 * @property int $created_at
 * @property int $updated_at
 * @property Upload $upload
 */
class Attachment extends Model
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
