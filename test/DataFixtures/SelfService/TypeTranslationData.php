<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\SelfService\TypeTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class TypeTranslationData extends BaseModelData
{
    public const DATA = [

        'type_id' => 2,
        'name' => 'test',
        'slug' => 'test',
        'description' => 'test',
        'locale' => 'ar',

    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return TypeTranslation::class;
    }
}
