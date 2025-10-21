<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

class StatusTranslation extends Translation
{
    /** @var array<string,string> */
    protected $casts = [
        'id'        => 'int',
        'status_id' => 'int',
        'name'      => 'string',
    ];
}
