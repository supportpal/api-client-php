<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class EmailTemplates extends BaseModel
{
    public function __construct(
        #[SerializedName('operator_department_changed')]
        public readonly int $operatorDepartmentChanged,
        #[SerializedName('operator_internal_opened')]
        public readonly int $operatorInternalOpened,
        #[SerializedName('user_ticket_locked')]
        public readonly int $userTicketLocked,
        #[SerializedName('user_ticket_reply')]
        public readonly int $userTicketReply,
        #[SerializedName('operator_assigned')]
        public readonly int $operatorAssigned,
        #[SerializedName('operator_ticket_note')]
        public readonly int $operatorTicketNote,
        #[SerializedName('user_ticket_opened')]
        public readonly int $userTicketOpened,
        #[SerializedName('user_ticket_operatorclose')]
        public readonly int $userTicketOperatorclose,
        #[SerializedName('operator_ticket_opened')]
        public readonly int $operatorTicketOpened,
        #[SerializedName('user_ticket_registeredonly')]
        public readonly int $userTicketRegisteredonly,
        #[SerializedName('user_ticket_autoclose')]
        public readonly int $userTicketAutoclose,
        #[SerializedName('user_email_attachmentrejected')]
        public readonly int $userEmailAttachmentrejected,
        #[SerializedName('operator_operator_ticket_reply')]
        public readonly int $operatorOperatorTicketReply,
        #[SerializedName('user_ticket_waitingresponse')]
        public readonly int $userTicketWaitingresponse,
        #[SerializedName('user_user_ticket_reply')]
        public readonly int $userUserTicketReply,
        #[SerializedName('user_ticket_disablereplies')]
        public readonly int $userTicketDisablereplies,
        #[SerializedName('operator_user_ticket_reply')]
        public readonly int $operatorUserTicketReply,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
