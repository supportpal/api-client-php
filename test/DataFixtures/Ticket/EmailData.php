<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Department\Email;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class EmailData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'department_id' => 1,
        'brand_id' => 1,
        'address' => 'test@example.com',
        'type' => 0,
        'protocol' => null,
        'server' => null,
        'username' => null,
        'password' => null,
        'port' => null,
        'encryption' => null,
        'consume_all' => null,
        'delete_downloaded' => null,
        'created_at' => 0,
        'updated_at' => 0,
        'oauth' => '1',
        'auth_mech' => 'test',
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Email::class;
    }
}
