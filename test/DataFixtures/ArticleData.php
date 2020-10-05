<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures;

use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleAttachmentData;

class ArticleData
{
    const ARTICLE_DATA = [
        'id' => 1,
        'author_id' => 1,
        'title' => 'test',
        'slug' => 'test',
        'keywords' => '',
        'excerpt' => '',
        'plain_text' => '',
        'text' => 'test',
        'purified_text' => 'test',
        'published' => 1,
        'published_at' => 1599475140,
        'protected' => 0,
        'pinned' => 0,
        'created_at' => 1599475205,
        'updated_at' => 1599475205,
        'attachments' => [ArticleAttachmentData::ARTICLE_ATTACHMENT],
        'categories' => [
            [
                'id' => 1,
                'type_id' => 1,
                'parent_id' => null,
                'name' => 'test',
                'slug' => 'test',
                'public' => 1,
                'parent_public' => 1,
                'created_at' => 1599475197,
                'updated_at' => 1599475197,
                'frontend_url' => 'http =>//localhost =>8080/index.php/announcements/category/test',
                'pivot' => [
                    'article_id' => 1,
                    'category_id' => 1
                ],
                'type' => [
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
                    'pivot' => [
                        'article_id' => 10,
                        'type_id' => 3,
                        'views' => 39
                    ],
                ]
            ]
        ],
    ];

    const GET_ARTICLE_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'data' => self::ARTICLE_DATA,
    ];

    const GET_ARTICLES_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'count' => 1,
        'data' => [self::ARTICLE_DATA],
    ];
}
