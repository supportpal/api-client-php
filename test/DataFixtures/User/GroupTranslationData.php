<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Model\User\GroupTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class GroupTranslationData extends BaseModelData
{
    public const DATA = [
        'user_group_id' => 2,
        'name' => 'test2',
        'description' => null,
        'locale' => 'ar',
    ];

    public static function getModel(): string
    {
        return GroupTranslation::class;
    }
}
