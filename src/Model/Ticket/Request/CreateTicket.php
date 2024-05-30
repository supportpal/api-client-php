<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;

class CreateTicket extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'user'                 => 'int',
        'on_behalf_of'         => 'int',
        'user_firstname'       => 'string',
        'user_lastname'        => 'string',
        'user_email'           => 'string',
        'user_organisation'    => 'string',
        'user_ip_address'      => 'string',
        'department'           => 'int',
        'brand'                => 'int',
        'status'               => 'int',
        'priority'             => 'int',
        'internal'             => 'bool',
        'subject'              => 'string',
        'text'                 => 'string',
        'tag'                  => 'array',
        'assignedto'           => 'array',
        'watching'             => 'array',
        'customfield'          => 'array',
        'cc'                   => 'array',
        'send_user_email'      => 'int',
        'send_operators_email' => 'int',
        'attachment'           => 'array',
        'created_at'           => 'int',
    ];
}
