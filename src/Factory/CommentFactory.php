<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\Comment;

/**
 * Class CommentFactory
 * @package SupportPal\ApiClient\Factory
 */
class CommentFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Comment::class;
    }
}
