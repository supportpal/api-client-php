<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\StatusTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class StatusTranslationData extends BaseModelData
{
    public const DATA = [
        'status_id' => 1,
        'name' => 'test',
        'locale' => 'ar',
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return StatusTranslation::class;
    }
}
