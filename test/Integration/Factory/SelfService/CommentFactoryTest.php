<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\SelfService;

use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Factory\SelfService\CommentFactory;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\Integration\Factory\BaseModelFactoryTestCase;

/**
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
    protected function getModel(): string
    {
        return Comment::class;
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
}
