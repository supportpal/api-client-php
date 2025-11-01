<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $colour
 * @property int $administrator
 * @property int $created_at
 * @property int $updated_at
 * @property GroupTranslation[] $translations
 */
class Group extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'            => 'int',
        'name'          => 'string',
        'description'   => 'string',
        'colour'        => 'string',
        'administrator' => 'int',
        'created_at'    => 'int',
        'updated_at'    => 'int',
        'translations'  => 'array:' . GroupTranslation::class,
    ];
}
