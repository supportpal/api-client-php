<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Model;

class Language extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'id'                => 'int',
        'name'              => 'string',
        'code'              => 'string',
        'enabled'           => 'bool',
        'upgrade_available' => 'bool',
        'version'           => 'string',
        'created_at'        => 'int',
        'updated_at'        => 'int',
        'formatted_name'    => 'string',
    ];
}
