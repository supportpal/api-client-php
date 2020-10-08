<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

class ChannelSettingsData
{
    public const CHANNEL_SETTINGS_DATA = [
        'unauthenticated_users' => '1',
        'show_captcha' => '1',
        'show_related_articles' => '1',
        'append_ip_address' => '1',
    ];

    public const GET_SUCCESSFUL_RESPONSE_DATA = [
        'status' => 'success',
        'message' => null,
        'data' => self::CHANNEL_SETTINGS_DATA,
    ];
}
