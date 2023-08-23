<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\TagTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class TagTranslationData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'tag_id' => 1,
        'name' => 'test',
        'locale' => 'ar',
    ];

     /**
      * @inheritDoc
      */
    public function getModel(): string
    {
        return TagTranslation::class;
    }
}
