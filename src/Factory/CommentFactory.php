<?php


namespace SupportPal\ApiClient\Factory;

use SupportPal\ApiClient\Model\Comment;

/**
 * Class CommentFactory
 * @package SupportPal\ApiClient\Factory
 */
class CommentFactory extends BaseModelFactory implements ModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Comment::class;
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return Comment::REQUIRED_FIELDS;
    }
}
