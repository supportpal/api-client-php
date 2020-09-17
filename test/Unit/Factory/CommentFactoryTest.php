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

    protected function getModelFactory(): ModelFactory
    {
        return new CommentFactory(
            $this->getSerializer(),
            $this->format,
            $this->getEncoder()
        );
    }

    protected function getModelData(): array
    {
        return self::COMMENT_DATA;
    }

    protected function getRequiredFields(): array
    {
        return Comment::REQUIRED_FIELDS;
    }

    protected function getModelInstance(): Model
    {
        return (new Comment)->fill(self::COMMENT_DATA);
    }

    protected function getModel(): string
    {
        return Comment::class;
    }
}
