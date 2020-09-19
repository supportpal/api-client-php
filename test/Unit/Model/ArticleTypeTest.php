<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\ArticleType;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleTypeData;

class ArticleTypeTest extends BaseModelTestCase
{
    const ARTICLE_TYPE_DATA = ArticleTypeData::ARTICLE_TYPE_DATA;

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return self::ARTICLE_TYPE_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new ArticleType;
    }
}
