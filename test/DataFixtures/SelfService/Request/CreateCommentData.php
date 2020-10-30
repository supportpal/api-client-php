<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request;

use SupportPal\ApiClient\Model\SelfService\Request\CreateComment;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class CreateCommentData extends BaseModelData
{
    public const DATA = [
        'article_id' => 5,
        'type_id' => 3,
        'parent_id' => 1,
        'author_id' => 3,
        'name' => 'test',
        'text' => 'test',
        'status' => 2,
        'notify_reply' => 0,
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return CreateComment::class;
    }
}
