<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\SelfService\ArticleTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class ArticleTranslationData extends BaseModelData
{
    public const DATA = [
        'article_id' => 10,
        'title' => 'test',
        'slug' => 'test',
        'keywords' => null,
        'excerpt' => null,
        'plain_text' => '',
        'text' => '<p>test</p>',
        'purified_text' => '<p>test</p>',
        'locale' => 'ar'
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return ArticleTranslation::class;
    }
}
