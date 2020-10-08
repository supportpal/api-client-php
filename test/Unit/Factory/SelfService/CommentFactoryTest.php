<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\CommentFactory;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\Unit\Factory\BaseModelFactoryTestCase;

/**
 * Class CommentFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory
 * @covers \SupportPal\ApiClient\Factory\SelfService\CommentFactory
 */
class CommentFactoryTest extends BaseModelFactoryTestCase
{
    const COMMENT_DATA = CommentData::COMMENT_DATA;

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new CommentFactory(
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
        return self::COMMENT_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return Comment::REQUIRED_FIELDS;
    }

    /**
     * @inheritDoc
     */
    protected function getModelInstance(): Model
    {
        return (new Comment)->fill(self::COMMENT_DATA);
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Comment::class;
    }
}
