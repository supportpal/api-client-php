<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Model;

/**
 * @property string $hash
 * @property string $filename
 * @property string $folder
 * @property string $mime
 * @property string $size
 * @property string|null $token
 * @property string $session_id
 * @property int $created_at
 * @property int $updated_at
 */
class Upload extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'hash'       => 'string',
        'filename'   => 'string',
        'folder'     => 'string',
        'mime'       => 'string',
        'size'       => 'string',
        'token'      => 'string',
        'session_id' => 'string',
        'created_at' => 'int',
        'updated_at' => 'int',
    ];
}
