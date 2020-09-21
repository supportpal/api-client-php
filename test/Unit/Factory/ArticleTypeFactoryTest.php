<?php


namespace SupportPal\ApiClient\Tests\Unit\Factory;

use SupportPal\ApiClient\Factory\ArticleTypeFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\ArticleType;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleTypeData;

class ArticleTypeFactoryTest extends BaseModelFactoryTestCase
{
    const ARTICLE_TYPE_DATA = ArticleTypeData::ARTICLE_TYPE_DATA;

    protected function getModelFactory(): ModelFactory
    {
        return new ArticleTypeFactory(
            $this->getSerializer(),
            $this->format,
            $this->getEncoder()
        );
    }

    protected function getModelData(): array
    {
        return self::ARTICLE_TYPE_DATA;
    }

    protected function getRequiredFields(): array
    {
        return ArticleType::REQUIRED_FIELDS;
    }

    protected function getModelInstance(): Model
    {
        return (new ArticleType)->fill(self::ARTICLE_TYPE_DATA);
    }

    protected function getModel(): string
    {
        return ArticleType::class;
    }
}
