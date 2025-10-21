<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

class DepartmentEmailTemplates extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'operator_department_changed' => 'int',
        'operator_internal_opened' => 'int',
        'user_ticket_locked' => 'int',
        'user_ticket_reply' => 'int',
        'operator_assigned' => 'int',
        'operator_ticket_note' => 'int',
        'user_ticket_opened' => 'int',
        'user_ticket_operatorclose' => 'int',
        'operator_ticket_opened' => 'int',
        'user_ticket_registeredonly' => 'int',
        'user_ticket_autoclose' => 'int',
        'user_email_attachmentrejected' => 'int',
        'operator_operator_ticket_reply' => 'int',
        'user_ticket_waitingresponse' => 'int',
        'user_user_ticket_reply' => 'int',
        'user_ticket_disablereplies' => 'int',
        'operator_user_ticket_reply' => 'int',
    ];
}
