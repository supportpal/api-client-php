<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Model\User\UserCustomFieldTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class UserCustomFieldTranslationData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'user_custom_field_id' => 1,
        'name' => 'test',
        'description' => '',
        'regex_error_message' => null,
        'locale' => 'ar',
    ];

    public function getModel(): string
    {
        return UserCustomFieldTranslation::class;
    }
}
