<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class GroupData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'System Administrators',
        'description' => 'Default group for administrators, always has all permissions.',
        'colour' => '#777777',
        'administrator' => 1,
        'created_at' => 1597245387,
        'updated_at' => 1597245387,
        'translations' => [GroupTranslationData::DATA,]
    ];

    public function getDataWithObjects(): array
    {
        $data = self::DATA;

        $data['translations'] = [(new GroupTranslationData)->getFilledInstance(),];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Group::class;
    }
}
