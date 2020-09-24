<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

class SettingsData
{
    public const SETTINGS_DATA = [
        'comment_captcha' => '1',
        'comment_moderation' => '1',
        'comment_ordering' => '2',
        'comment_ratings' => '1',
        'comment_threshold' => '-2',
        'comment_write' => '0',
        'comments_enabled' => '1',
        'rating_post' => '0',
        'ratings_enabled' => '1'
    ];

    public const GET_SETTINGS_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'data' => self::SETTINGS_DATA,
    ];
}
