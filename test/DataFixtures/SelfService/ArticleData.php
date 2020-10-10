<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class ArticleData extends BaseModelData
{
    const DATA = [
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
        'attachments' => [ArticleAttachmentData::DATA,],
        'categories' => [CategoryData::DATA,],
        'types' => [TypeData::DATA,],
        'tags' => [TagData::DATA,]
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['attachments'] = [ArticleAttachmentData::getFilledInstance(),];
        $data['categories'] = [CategoryData::getFilledInstance(),];
        $data['types'] = [TypeData::getFilledInstance(),];
        $data['tags'] = [TagData::getFilledInstance(),];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Article::class;
    }
}
