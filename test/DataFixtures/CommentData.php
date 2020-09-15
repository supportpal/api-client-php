<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures;

final class CommentData
{

    public const POST_COMMENT_SUCCESSFUL_RESPONSE = [
        "status" => "success",
        "message" => "Successfully created new comment!",
        "data" => [
            "article_id" => 1,
            "type_id" => 1,
            "text" => "test",
            "status" => 0,
            "author_id" => 23,
            "notify_reply" => 0,
            "parent_id" => null,
            "id" => 1,
        ]
    ];

    public const COMMENT_DATA = [
        'text' => 'text',
        'article_id' => 3,
        'type_id' => 1,
        'parent_id' => 1,
        'status' => 3,
        'notify_reply' => 0
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
                    ],
            ],
    ];
}
