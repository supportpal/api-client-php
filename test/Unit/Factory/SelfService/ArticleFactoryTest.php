<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\ArticleFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class ArticleFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\SelfService
 * @covers \SupportPal\ApiClient\Factory\SelfService\ArticleFactory
 */
class ArticleFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new ArticleFactory;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new ArticleData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new ArticleData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Article::class;
    }
}
