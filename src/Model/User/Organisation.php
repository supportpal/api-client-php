<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Model;

class Organisation extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'id'            => 'int',
        'brand_id'      => 'int',
        'owner_id'      => 'int',
        'name'          => 'string',
        'country'       => 'string',
        'language_code' => 'string',
        'timezone'      => 'string',
        'notes'         => 'string',
        'created_at'    => 'int',
        'updated_at'    => 'int',
        'users'         => 'array:' . User::class,
        'customfields'  => 'array:' . UserCustomField::class,
        'domains'       => 'array:' . Domain::class,
    ];
}
