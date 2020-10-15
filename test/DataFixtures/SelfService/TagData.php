<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\SelfService\Tag;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class TagData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'test',
        'slug' => 'test',
        'created_at' => 1600880073,
        'updated_at' => 1600880073
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Tag::class;
    }
}
