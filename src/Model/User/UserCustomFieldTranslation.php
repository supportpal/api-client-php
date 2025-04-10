<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Translation;

class UserCustomFieldTranslation extends Translation
{
    /** @var array<string,string> */
    protected array $casts = [
        'id'                   => 'int',
        'user_custom_field_id' => 'int',
        'name'                 => 'string',
        'description'          => 'string',
        'purified_description' => 'string',
        'regex_error_message'  => 'string',
    ];
}
