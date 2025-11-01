<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $user_group_id
 * @property string $name
 * @property string|null $description
 */
class GroupTranslation extends Translation
{
    /** @var array<string,string> */
    protected $casts = [
        'id'            => 'int',
        'user_group_id' => 'int',
        'name'          => 'string',
        'description'   => 'string',
    ];
}
