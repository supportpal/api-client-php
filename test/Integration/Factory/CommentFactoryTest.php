<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use SupportPal\ApiClient\Factory\CommentFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

/**
 * @covers \SupportPal\ApiClient\Factory\CommentFactory
 * Class CommentFactoryTest
 * @package SupportPal\ApiClient\Tests\Integration
 */
class CommentFactoryTest extends BaseModelFactoryTestCase
{
    const COMMENT_DATA = CommentData::COMMENT_DATA;

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
    protected function getModelData(): array
    {
        return self::COMMENT_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModelFactory(): ModelFactory
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = $this->getContainer()->get(CommentFactory::class);

        return $modelFactory;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): string
    {
        return Comment::class;
    }
}
