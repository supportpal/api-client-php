<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\CategoryFactory;
use SupportPal\ApiClient\Model\SelfService\Category;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

class CategoryFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return Category::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return CategoryData::DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Category::class;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(CategoryFactory::class);

        return $modelFactory;
    }
}
