<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property int $brand_id
 * @property int|null $owner_id
 * @property string $name
 * @property string|null $country
 * @property string|null $language_code
 * @property string|null $timezone
 * @property string|null $notes
 * @property int $created_at
 * @property int $updated_at
 * @property Domain[] $domains
 * @property User[] $users
 * @property UserCustomField[] $customfields
 */
class Organisation extends Model
{
    /** @var array<string, string> */
    protected $casts = [
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
        'domains'       => 'array:' . Domain::class,
        'users'         => 'array:' . User::class,
        'customfields'  => 'array:' . UserCustomField::class,
    ];
}
