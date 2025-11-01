<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $user_custom_field_id
 * @property string $name
 * @property string $description
 * @property string $purified_description
 * @property string $regex_error_message
 */
class UserCustomFieldTranslation extends Translation
{
    /** @var array<string,string> */
    protected $casts = [
        'id'                   => 'int',
        'user_custom_field_id' => 'int',
        'name'                 => 'string',
        'description'          => 'string',
        'purified_description' => 'string',
        'regex_error_message'  => 'string',
    ];
}
