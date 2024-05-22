<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class EmailTemplates extends BaseModel
{
    #[SerializedName('operator_department_changed')]
    protected int $operatorDepartmentChanged;

    #[SerializedName('operator_internal_opened')]
    protected int $operatorInternalOpened;

    #[SerializedName('user_ticket_locked')]
    protected int $userTicketLocked;

    #[SerializedName('user_ticket_reply')]
    protected int $userTicketReply;

    #[SerializedName('operator_assigned')]
    protected int $operatorAssigned;

    #[SerializedName('operator_ticket_note')]
    protected int $operatorTicketNote;

    #[SerializedName('user_ticket_opened')]
    protected int $userTicketOpened;

    #[SerializedName('user_ticket_operatorclose')]
    protected int $userTicketOperatorclose;

    #[SerializedName('operator_ticket_opened')]
    protected int $operatorTicketOpened;

    #[SerializedName('user_ticket_registeredonly')]
    protected int $userTicketRegisteredonly;

    #[SerializedName('user_ticket_autoclose')]
    protected int $userTicketAutoclose;

    #[SerializedName('user_email_attachmentrejected')]
    protected int $userEmailAttachmentrejected;

    #[SerializedName('operator_operator_ticket_reply')]
    protected int $operatorOperatorTicketReply;

    #[SerializedName('user_ticket_waitingresponse')]
    protected int $userTicketWaitingresponse;

    #[SerializedName('user_user_ticket_reply')]
    protected int $userUserTicketReply;

    #[SerializedName('user_ticket_disablereplies')]
    protected int $userTicketDisablereplies;

    #[SerializedName('operator_user_ticket_reply')]
    protected int $operatorUserTicketReply;

    public function getOperatorDepartmentChanged(): int
    {
        return $this->operatorDepartmentChanged;
    }

    public function getOperatorInternalOpened(): int
    {
        return $this->operatorInternalOpened;
    }
    public function getUserTicketLocked(): int
    {
        return $this->userTicketLocked;
    }

    public function getUserTicketReply(): int
    {
        return $this->userTicketReply;
    }

    public function getOperatorAssigned(): int
    {
        return $this->operatorAssigned;
    }

    public function getOperatorTicketNote(): int
    {
        return $this->operatorTicketNote;
    }

    public function getUserTicketOpened(): int
    {
        return $this->userTicketOpened;
    }

    public function getUserTicketOperatorclose(): int
    {
        return $this->userTicketOperatorclose;
    }

    public function getOperatorTicketOpened(): int
    {
        return $this->operatorTicketOpened;
    }

    public function getUserTicketRegisteredonly(): int
    {
        return $this->userTicketRegisteredonly;
    }

    public function getUserTicketAutoclose(): int
    {
        return $this->userTicketAutoclose;
    }

    public function getUserEmailAttachmentrejected(): int
    {
        return $this->userEmailAttachmentrejected;
    }

    public function getOperatorOperatorTicketReply(): int
    {
        return $this->operatorOperatorTicketReply;
    }

    public function getUserTicketWaitingresponse(): int
    {
        return $this->userTicketWaitingresponse;
    }

    public function getUserUserTicketReply(): int
    {
        return $this->userUserTicketReply;
    }

    public function getUserTicketDisablereplies(): int
    {
        return $this->userTicketDisablereplies;
    }

    public function getOperatorUserTicketReply(): int
    {
        return $this->operatorUserTicketReply;
    }
}
