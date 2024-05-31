<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;

class UpdateTicket extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'brand'                        => 'int',
        'user'                         => 'int',
        'department'                   => 'int',
        'department_email'             => 'int',
        'status'                       => 'int',
        'priority'                     => 'int',
        'subject'                      => 'string',
        'tag'                          => 'array',
        'assignedto'                   => 'array',
        'watching'                     => 'array',
        'link'                         => 'array',
        'unlink'                       => 'array',
        'sla_plan'                     => 'int',
        'reply_due_time'               => 'int',
        'resolve_due_time'             => 'int',
        'customfield'                  => 'array',
        'overwrite_customfield_values' => 'bool',
        'cc'                           => 'array',
        'locked'                       => 'bool',
    ];
}
