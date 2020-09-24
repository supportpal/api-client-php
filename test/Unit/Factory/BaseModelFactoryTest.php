<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

/**
 * Class BaseModelFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\BaseModelFactory
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
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return Comment::REQUIRED_FIELDS;
    }

    protected function getModelData(): array
    {
        return CommentData::COMMENT_DATA;
    }

    protected function getModel(): string
    {
        return Comment::class;
    }

    protected function getModelFactory(): ModelFactory
    {
        $mock = $this->getMockForAbstractClass(
            BaseModelFactory::class,
            [$this->getSerializer(), $this->format, $this->getEncoder()]
        );

        $mock->expects($this->any())
            ->method('getModel')
            ->will($this->returnValue(Comment::class));

        return $mock;
    }
}
