<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\PriorityTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class PriorityTranslationData extends BaseModelData
{
    public const DATA = [
        'priority_id' => 1,
        'name' => 'test',
        'locale' => 'ar',
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return PriorityTranslation::class;
    }
}
