<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\SelfService\Comment;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

class CommentData extends BaseModelData
{
    public const POST_RESPONSE = [
        'status' => 'success',
        'message' => 'Successfully created new comment!',
        'data' => self::DATA,
    ];

    public const DATA = [
        'id' => 1,
        'article_id' => 1,
        'type_id' => 1,
        'author_id' => 23,
        'text' => 'test',
        'purified_text' => 'test',
        'parent_id' => null,
        'root_parent_id' => null,
        'rating' => 0,
        'status' => 0,
        'notify_reply' => 0,
        'created_at' => 1599475251,
        'updated_at' => 1599475251,
        'name' => 'test',
        'author' => UserData::DATA,
        'article' => ArticleData::DATA,
        'type' => TypeData::DATA,
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['type'] = TypeData::getFilledInstance();
        $data['article'] = ArticleData::getFilledInstance();
        $data['author'] = UserData::getFilledInstance();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Comment::class;
    }
}
