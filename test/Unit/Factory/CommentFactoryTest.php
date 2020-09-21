<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory;

use SupportPal\ApiClient\Factory\CommentFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

class CommentFactoryTest extends BaseModelFactoryTestCase
{
    const COMMENT_DATA = CommentData::COMMENT_DATA;

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        return new CommentFactory(
            $this->getSerializer(),
            $this->format,
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
