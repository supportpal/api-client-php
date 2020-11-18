<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\SlaPlanTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class SlaPlanTranslationData extends BaseModelData
{
    public const DATA = [
        'sla_plan_id' => 1,
        'name' => 'test',
        'description' => 'test',
        'locale' => 'ar',
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return SlaPlanTranslation::class;
    }
}
