<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class SettingsData extends BaseModelData
{
    public const DATA = [
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

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Settings::class;
    }
}
