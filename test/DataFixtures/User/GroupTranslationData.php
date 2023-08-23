<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Model\User\GroupTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class GroupTranslationData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'user_group_id' => 2,
        'name' => 'test2',
        'description' => null,
        'locale' => 'ar',
    ];

    public function getModel(): string
    {
        return GroupTranslation::class;
    }
}
