<?php
declare(strict_types=1);


namespace SupportPal\ApiClient\Tests\Integration\Factory;

use SupportPal\ApiClient\Factory\CommentFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Model\Comment;

/**
 * @covers \SupportPal\ApiClient\Factory\CommentFactory
 * Class CommentFactoryTest
 * @package SupportPal\ApiClient\Tests\Integration
 */
class CommentFactoryTest extends BaseModelFactoryTestCase
{

    const COMMENT_DATA = [
        'text' => 'text',
        'article_id' => 3,
        'type_id' => 1,
        'parent_id' => 1,
        'status' => 3,
        'notify_reply' => false
    ];

    /**
     * @inheritDoc
     */
    protected function getInvalidTypesData(): array
    {
        return [
            'text' => new \stdClass,
            'article_id' => 'text',
            'type_id' => 'text',
            'parent_id' => 'text',
            'status' => 'text',
            'notify_reply' => null
        ];
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
