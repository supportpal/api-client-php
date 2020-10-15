<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Shared;

use SupportPal\ApiClient\Model\Shared\Option;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class OptionData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'field_id' => 2,
        'order' => 0,
        'value' => 'test',
        'created_at' => 1602321106,
        'updated_at' => 1602321106
    ];

    public static function getModel(): string
    {
        return Option::class;
    }
}
