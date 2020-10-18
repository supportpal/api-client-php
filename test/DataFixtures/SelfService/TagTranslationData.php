<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\SelfService\TagTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class TagTranslationData extends BaseModelData
{
    public const DATA = [
        'tag_id' => 2,
        'name' => 'test',
        'slug' => 'test-2',
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
