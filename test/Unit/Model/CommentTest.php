<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

class CommentTest extends BaseModelTestCase
{

    const COMMENT_DATA = CommentData::COMMENT_DATA;

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Comment;
    }

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
    protected function getModelData(): array
    {
        return self::COMMENT_DATA;
    }
}
