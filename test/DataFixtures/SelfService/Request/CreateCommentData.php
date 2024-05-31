<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService\Request;

use SupportPal\ApiClient\Model\SelfService\Request\CreateComment;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;

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

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => CommentData::DATA,
        ];
    }
}
