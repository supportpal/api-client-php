<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

class DepartmentEmail extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'department_id'     => 'int',
        'brand_id'          => 'int',
        'address'           => 'string',
        'type'              => 'int',
        'protocol'          => 'int',
        'server'            => 'string',
        'username'          => 'string',
        'auth_mech'         => 'string',
        'password'          => 'string',
        'oauth'             => 'string',
        'port'              => 'string',
        'encryption'        => 'int',
        'consume_all'       => 'int',
        'delete_downloaded' => 'int',
        'created_at'        => 'int',
        'updated_at'        => 'int',
    ];
}
