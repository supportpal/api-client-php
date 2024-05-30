<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

class TicketCustomFieldTranslation extends Translation
{
    /** @var array<string,string> */
    protected array $casts = [
        'id'                     => 'int',
        'ticket_custom_field_id' => 'int',
        'name'                   => 'string',
        'description'            => 'string',
        'regex_error_message'    => 'string',
    ];
}
