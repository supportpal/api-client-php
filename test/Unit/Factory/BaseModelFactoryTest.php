<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;

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

    /**
     * @return array<mixed>
     */
    protected function getModelData(): array
    {
        return CommentData::DATA;
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
        $mock = $this->getMockForAbstractClass(
            BaseModelFactory::class,
            [$this->format, $this->getSerializer(), $this->getEncoder()]
        );

        $mock->expects($this->any())
            ->method('getModel')
            ->will($this->returnValue(Comment::class));

        return $mock;
    }
}
