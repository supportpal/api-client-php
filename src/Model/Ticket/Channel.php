<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

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
