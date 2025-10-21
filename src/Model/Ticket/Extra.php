<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

class Extra extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'bcc_address' => 'array',
        'to_address'  => 'array',
        'cc_address'  => 'array',
    ];
}
