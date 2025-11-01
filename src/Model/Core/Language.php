<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property bool $enabled
 * @property bool $upgrade_available
 * @property string $version
 * @property int $created_at
 * @property int $updated_at
 * @property string $formatted_name
 */
class Language extends Model
{
    /** @var array<string, string> */
    protected $casts = [
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
