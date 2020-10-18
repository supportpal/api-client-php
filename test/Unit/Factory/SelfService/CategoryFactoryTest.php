<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\CategoryFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Category;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class CategoryFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\SelfService
 * @covers \SupportPal\ApiClient\Factory\SelfService\CategoryFactory
 */
class CategoryFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new CategoryFactory(
            $this->format,
            $this->getSerializer(),
            $this->getEncoder()
        );
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new CategoryData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new CategoryData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Category::class;
    }
}
