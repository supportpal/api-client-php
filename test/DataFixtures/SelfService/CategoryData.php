<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Category;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class CategoryData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'type_id' => 1,
        'parent_id' => null,
        'name' => 'test',
        'slug' => 'test',
        'public' => 1,
        'parent_public' => 1,
        'created_at' => 1599475197,
        'updated_at' => 1599475197,
        'frontend_url' => 'http://localhost:8080/index.php/announcements/category/test',
        'type' => TypeData::DATA,
        'pivot' => [
            'article_id' => 1,
            'category_id' => 1
        ],
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['type'] = TypeData::getFilledInstance();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Category::class;
    }
}
