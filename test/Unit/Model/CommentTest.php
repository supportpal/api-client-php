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
    protected function getModelData(): array
    {
        return self::COMMENT_DATA;
    }
}
