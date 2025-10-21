<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Translation;

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
