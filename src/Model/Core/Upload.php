<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Model;

class Upload extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
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
