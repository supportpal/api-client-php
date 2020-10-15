<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\TicketCustomFieldTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class TicketCustomFieldTranslationData extends BaseModelData
{
    public const DATA = [
        'ticket_custom_field_id' => 1,
        'name' => 'test',
        'description' => '',
        'regex_error_message' => null,
        'locale' => 'ar'
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return TicketCustomFieldTranslation::class;
    }
}
