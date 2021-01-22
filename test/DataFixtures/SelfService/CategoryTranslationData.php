<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\SelfService\CategoryTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class CategoryTranslationData extends BaseModelData
{
    public const DATA = [
        'category_id' => 2,
        'name' => 'test',
        'slug' => 'test',
        'description' => 'test',
        'locale' => 'ar'
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CategoryTranslation::class;
    }
}
