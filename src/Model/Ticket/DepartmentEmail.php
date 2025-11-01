<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $department_id
 * @property int $brand_id
 * @property string $address
 * @property int $type
 * @property int $protocol
 * @property string $server
 * @property string $username
 * @property string $auth_mech
 * @property string $password
 * @property string $oauth
 * @property string $port
 * @property int $encryption
 * @property int $consume_all
 * @property int $delete_downloaded
 * @property int $created_at
 * @property int $updated_at
 */
class DepartmentEmail extends Model
{
    /** @var array<string, string> */
    protected $casts = [
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
