<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core;

use SupportPal\ApiClient\Model\Core\BrandTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class BrandTranslationData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'brand_id' => 1,
        'name' => 'test',
        'locale' => 'ar',
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return BrandTranslation::class;
    }
}
