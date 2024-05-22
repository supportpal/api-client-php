<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;

/**
 * Class BaseModelFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\ModelFactory
 */
class BaseModelFactoryTest extends BaseModelFactoryTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return new Comment;
    }

    /**
     * @return array<mixed>
     */
    protected function getModelData(): array
    {
        return (new CommentData)->getArrayData();
    }

    /**
     * @return string
     */
    protected function getModel(): string
    {
        return Comment::class;
    }

    /**
     * @return ModelFactory
     */
    protected function getModelFactory(): ModelFactory
    {
        $mock = $this->getMockForAbstractClass(ModelFactory::class);

        $mock->expects($this->any())
            ->method('getModel')
            ->will($this->returnValue(Comment::class));

        return $mock;
    }
}
