<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $enabled
 * @property int $upgrade_available
 * @property string|null $version
 * @property int $created_at
 * @property int $updated_at
 * @property int $show_on_frontend
 * @property string $formatted_name
 */
class Channel extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'                => 'int',
        'name'              => 'string',
        'enabled'           => 'int',
        'upgrade_available' => 'int',
        'version'           => 'string',
        'created_at'        => 'int',
        'updated_at'        => 'int',
        'show_on_frontend'  => 'int',
        'formatted_name'    => 'string',
    ];
}
