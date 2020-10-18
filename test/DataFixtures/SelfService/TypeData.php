<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Type;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;

class TypeData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'brand_id' => 1,
        'name' => 'Announcements',
        'slug' => 'announcements',
        'description' => 'View the latest news and announcements.',
        'order' => 1,
        'enabled' => 1,
        'protected' => 0,
        'internal' => 0,
        'content' => 0,
        'view' => 1,
        'icon' => 'fa-newspaper',
        'article_ordering' => 2,
        'show_on_dashboard' => 1,
        'external_link' => null,
        'created_at' => 1597245387,
        'updated_at' => 1597245387,
        'brand' => BrandData::DATA,
        'translations' => [TypeTranslationData::DATA],
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['brand'] = (new BrandData)->getFilledInstance();
        $data['translations'] = [(new TypeTranslationData)->getFilledInstance()];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Type::class;
    }
}
