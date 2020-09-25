<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\SelfService;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class ArticleTest
 * @package SupportPal\ApiClient\Tests\Unit\Model
 * @covers \SupportPal\ApiClient\Model\SelfService\Article
 */
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
