<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\TagTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class TagTranslationData extends BaseModelData
{
    public const DATA = [
        'tag_id' => 1,
        'name' => 'test',
        'locale' => 'ar',
    ];

     /**
      * @inheritDoc
      */
    public static function getModel(): string
    {
        return TagTranslation::class;
    }
}