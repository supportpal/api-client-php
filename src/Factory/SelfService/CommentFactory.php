<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\SelfService;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\SelfService\Comment;

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
