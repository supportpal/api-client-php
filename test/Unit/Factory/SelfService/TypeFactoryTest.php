<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\TypeFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Type;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class ArticleTypeFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\SelfService\TypeFactory
 */
class TypeFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new TypeFactory;
    }

    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new TypeData)->getArrayData();
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new TypeData)->getFilledInstance();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Type::class;
    }
}
