<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $operator_department_changed
 * @property int $operator_internal_opened
 * @property int $user_ticket_locked
 * @property int $user_ticket_reply
 * @property int $operator_assigned
 * @property int $operator_ticket_note
 * @property int $user_ticket_opened
 * @property int $user_ticket_operatorclose
 * @property int $operator_ticket_opened
 * @property int $user_ticket_registeredonly
 * @property int $user_ticket_autoclose
 * @property int $user_email_attachmentrejected
 * @property int $operator_operator_ticket_reply
 * @property int $user_ticket_waitingresponse
 * @property int $user_user_ticket_reply
 * @property int $user_ticket_disablereplies
 * @property int $operator_user_ticket_reply
 */
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
