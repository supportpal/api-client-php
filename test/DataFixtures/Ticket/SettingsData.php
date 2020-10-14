<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class SettingsData extends BaseModelData
{
    public const DATA = [
        'allowed_files' => 'doc|docx|xml|png|gif|jpg|jpeg|zip|rar|pdf|txt|log',
        'default_open_status' => '1',
        'default_resolved_status' => '2',
        'inactive_close_time' => '604800',
        'ticket_notes_position' => '0',
        'ticket_number_format' => '%N{7}',
        'ticket_reply_order' => '0',
        'waiting_response_time' => '345600',
        'default_reply_status' => '1'
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Settings::class;
    }
}
