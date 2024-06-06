<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request;

use SupportPal\ApiClient\Model\SelfService\Request\CreateArticle;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;

class CreateArticleData extends BaseModelData
{
    public const DATA = [
        'author_id'    => 5,
        'title'        => 'Article',
        'slug'         => 'article',
        'excerpt'      => 'This is an excerpt',
        'text'         => 'This is the full article',
        'category'     => [1],
        'tag'          => [1],
        'published'    => true,
        'published_at' => 1700000000,
        'protected'    => false,
        'pinned'       => false,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateArticle::class;
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => ArticleData::DATA,
        ];
    }
}
