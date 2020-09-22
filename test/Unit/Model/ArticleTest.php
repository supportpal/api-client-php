<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\Article;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleData;

class ArticleTest extends BaseModelTestCase
{
    const ARTICLE_DATA = ArticleData::ARTICLE_DATA;

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Article;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::ARTICLE_DATA;
    }
}
