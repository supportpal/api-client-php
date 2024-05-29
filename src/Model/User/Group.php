<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Model;

class Group extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
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
