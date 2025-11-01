<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $ticket_custom_field_id
 * @property string $name
 * @property string $description
 * @property string $purified_description
 * @property string $regex_error_message
 */
class TicketCustomFieldTranslation extends Translation
{
    /** @var array<string,string> */
    protected $casts = [
        'id'                     => 'int',
        'ticket_custom_field_id' => 'int',
        'name'                   => 'string',
        'description'            => 'string',
        'purified_description'   => 'string',
        'regex_error_message'    => 'string',
    ];
}
