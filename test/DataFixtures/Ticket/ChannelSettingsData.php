<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\ChannelSettings;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class ChannelSettingsData extends BaseModelData
{
    public const DATA = [
        'unauthenticated_users' => '1',
        'show_captcha' => '1',
        'show_related_articles' => '1',
        'append_ip_address' => '1',
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return ChannelSettings::class;
    }
}
