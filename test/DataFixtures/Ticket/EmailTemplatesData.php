<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Department\EmailTemplates;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class EmailTemplatesData extends BaseModelData
{
    public const DATA = [
        'user_ticket_opened' => 3,
        'user_user_ticket_reply' => 29,
        'user_ticket_reply' => 2,
        'user_ticket_locked' => 8,
        'user_ticket_waitingresponse' => 11,
        'user_ticket_autoclose' => 13,
        'user_ticket_operatorclose' => 20,
        'user_email_attachmentrejected' => 21,
        'user_ticket_disablereplies' => -1,
        'user_ticket_registeredonly' => 28,
        'operator_assigned' => 1,
        'operator_ticket_opened' => 4,
        'operator_user_ticket_reply' => 5,
        'operator_internal_opened' => 18,
        'operator_department_changed' => 19,
        'operator_operator_ticket_reply' => 23,
        'operator_ticket_note' => 24
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return EmailTemplates::class;
    }
}
