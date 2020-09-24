<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\SelfService\Type;

class CategoryData
{
    public const CATEGORY_DATA = [
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
        'pivot' => [
            'article_id' => 1,
            'category_id' => 1
        ],
    ];

    public const GET_CATEGORIES_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'data' => [self::CATEGORY_DATA],
    ];

    public const GET_CATEGORY_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'data' => self::CATEGORY_DATA,
    ];

    public static function getCategoryData(): array
    {
        $data = self::CATEGORY_DATA;
        $data['type'] = new Type;

        return $data;
    }
}
