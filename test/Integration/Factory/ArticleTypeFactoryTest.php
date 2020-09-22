<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use SupportPal\ApiClient\Factory\ArticleTypeFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\ArticleType;
use SupportPal\ApiClient\Tests\DataFixtures\ArticleTypeData;

class ArticleTypeFactoryTest extends BaseModelFactoryTestCase
{
    const ARTICLE_TYPE_DATA = ArticleTypeData::ARTICLE_TYPE_DATA;

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return ArticleType::REQUIRED_FIELDS;
    }

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
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(ArticleTypeFactory::class);

        return $modelFactory;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return ArticleType::class;
    }
}
