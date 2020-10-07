<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\SelfService\Article;
use SupportPal\ApiClient\Model\SelfService\Type;
use SupportPal\ApiClient\Model\User\User;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UserData;

final class CommentData
{
    public const POST_COMMENT_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => 'Successfully created new comment!',
        'data' => [
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
            'name' => 'test'
        ]
    ];

    public const COMMENT_DATA = [
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
    ];

    public const GET_COMMENTS_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'count' => 12,
        'data' =>
            [
                0 =>
                    [
                        'id' => 1,
                        'article_id' => 1,
                        'type_id' => 1,
                        'author_id' => 23,
                        'text' => 'test',
                        'purified_text' => 'test',
                        'parent_id' => null,
                        'status' => 0,
                        'notify_reply' => 0,
                        'author' => UserData::USER_DATA,
                        'article' => ArticleData::ARTICLE_DATA,
                        'type' => TypeData::ARTICLE_TYPE_DATA,
                        'created_at' => 1,
                        'updated_at' => 1,
                    ],
            ],
    ];

    /**
     * @return array<mixed>
     */
    public static function getCommentData(): array
    {
        $data = CommentData::COMMENT_DATA;
        $data['type'] = new Type;
        $data['article'] = new Article;
        $data['author'] = new User;

        return $data;
    }
}
