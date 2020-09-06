<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit;

use SupportPal\ApiClient\Factory\CommentFactory;
use SupportPal\ApiClient\Factory\ModelFactory;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Model\Model;

class CommentFactoryTest extends BaseModelFactoryTestCase
{
    use StringHelper;

    const COMMENT_DATA = [
        'text' => 'text',
        'article_id' => 3,
        'type_id' => 1,
        'parent_id' => 1,
        'status' => 3,
        'notify_reply' => false
    ];

    protected function getModelFactory(): ModelFactory
    {
        return new CommentFactory(
            $this->getSerializer(),
            $this->format
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
        return new Comment;
    }

    protected function getModel(): string
    {
        return Comment::class;
    }
}
