<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core;

use SupportPal\ApiClient\Model\Core\BrandTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class BrandTranslationData extends BaseModelData
{
    public const DATA = [

        'brand_id' => 1,
        'name' => 'test',
        'locale' => 'ar',

    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return BrandTranslation::class;
    }
}
