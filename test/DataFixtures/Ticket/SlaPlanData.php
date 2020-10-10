<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\SlaPlan;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class SlaPlanData extends BaseModelData
{
    public const DATA = [
        'conditionGroupType' => 1,
        'description' => 'test str',
        'createdAt' => 12345,
        'order' => 1223,
        'updatedAt' => 1234456,
        'allHours' => 1,
        'name' => 'test'
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return SlaPlan::class;
    }
}
