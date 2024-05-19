<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class EmailTemplates extends BaseModel
{
    #[SerializedName('operator_department_changed')]
    private int $operatorDepartmentChanged;

    #[SerializedName('operator_internal_opened')]
    private int $operatorInternalOpened;

    #[SerializedName('user_ticket_locked')]
    private int $userTicketLocked;

    #[SerializedName('user_ticket_reply')]
    private int $userTicketReply;

    #[SerializedName('operator_assigned')]
    private int $operatorAssigned;

    #[SerializedName('operator_ticket_note')]
    private int $operatorTicketNote;

    #[SerializedName('user_ticket_opened')]
    private int $userTicketOpened;

    #[SerializedName('user_ticket_operatorclose')]
    private int $userTicketOperatorclose;

    #[SerializedName('operator_ticket_opened')]
    private int $operatorTicketOpened;

    #[SerializedName('user_ticket_registeredonly')]
    private int $userTicketRegisteredonly;

    #[SerializedName('user_ticket_autoclose')]
    private int $userTicketAutoclose;

    #[SerializedName('user_email_attachmentrejected')]
    private int $userEmailAttachmentrejected;

    #[SerializedName('operator_operator_ticket_reply')]
    private int $operatorOperatorTicketReply;

    #[SerializedName('user_ticket_waitingresponse')]
    private int $userTicketWaitingresponse;

    #[SerializedName('user_user_ticket_reply')]
    private int $userUserTicketReply;

    #[SerializedName('user_ticket_disablereplies')]
    private int $userTicketDisablereplies;

    #[SerializedName('operator_user_ticket_reply')]
    private int $operatorUserTicketReply;

    public function getOperatorDepartmentChanged(): int
    {
        return $this->operatorDepartmentChanged;
    }

    public function setOperatorDepartmentChanged(int $operatorDepartmentChanged): self
    {
        $this->operatorDepartmentChanged = $operatorDepartmentChanged;

        return $this;
    }

    public function getOperatorInternalOpened(): int
    {
        return $this->operatorInternalOpened;
    }

    public function setOperatorInternalOpened(int $operatorInternalOpened): self
    {
        $this->operatorInternalOpened = $operatorInternalOpened;

        return $this;
    }

    public function getUserTicketLocked(): int
    {
        return $this->userTicketLocked;
    }

    public function setUserTicketLocked(int $userTicketLocked): self
    {
        $this->userTicketLocked = $userTicketLocked;

        return $this;
    }

    public function getUserTicketReply(): int
    {
        return $this->userTicketReply;
    }

    public function setUserTicketReply(int $userTicketReply): self
    {
        $this->userTicketReply = $userTicketReply;

        return $this;
    }

    public function getOperatorAssigned(): int
    {
        return $this->operatorAssigned;
    }

    public function setOperatorAssigned(int $operatorAssigned): self
    {
        $this->operatorAssigned = $operatorAssigned;

        return $this;
    }

    public function getOperatorTicketNote(): int
    {
        return $this->operatorTicketNote;
    }

    public function setOperatorTicketNote(int $operatorTicketNote): self
    {
        $this->operatorTicketNote = $operatorTicketNote;

        return $this;
    }

    public function getUserTicketOpened(): int
    {
        return $this->userTicketOpened;
    }

    public function setUserTicketOpened(int $userTicketOpened): self
    {
        $this->userTicketOpened = $userTicketOpened;

        return $this;
    }

    public function getUserTicketOperatorclose(): int
    {
        return $this->userTicketOperatorclose;
    }

    public function setUserTicketOperatorclose(int $userTicketOperatorclose): self
    {
        $this->userTicketOperatorclose = $userTicketOperatorclose;

        return $this;
    }

    public function getOperatorTicketOpened(): int
    {
        return $this->operatorTicketOpened;
    }

    public function setOperatorTicketOpened(int $operatorTicketOpened): self
    {
        $this->operatorTicketOpened = $operatorTicketOpened;

        return $this;
    }

    public function getUserTicketRegisteredonly(): int
    {
        return $this->userTicketRegisteredonly;
    }

    public function setUserTicketRegisteredonly(int $userTicketRegisteredonly): self
    {
        $this->userTicketRegisteredonly = $userTicketRegisteredonly;

        return $this;
    }

    public function getUserTicketAutoclose(): int
    {
        return $this->userTicketAutoclose;
    }

    public function setUserTicketAutoclose(int $userTicketAutoclose): self
    {
        $this->userTicketAutoclose = $userTicketAutoclose;

        return $this;
    }

    public function getUserEmailAttachmentrejected(): int
    {
        return $this->userEmailAttachmentrejected;
    }

    public function setUserEmailAttachmentrejected(int $userEmailAttachmentrejected): self
    {
        $this->userEmailAttachmentrejected = $userEmailAttachmentrejected;

        return $this;
    }

    public function getOperatorOperatorTicketReply(): int
    {
        return $this->operatorOperatorTicketReply;
    }

    public function setOperatorOperatorTicketReply(int $operatorOperatorTicketReply): self
    {
        $this->operatorOperatorTicketReply = $operatorOperatorTicketReply;

        return $this;
    }

    public function getUserTicketWaitingresponse(): int
    {
        return $this->userTicketWaitingresponse;
    }

    public function setUserTicketWaitingresponse(int $userTicketWaitingresponse): self
    {
        $this->userTicketWaitingresponse = $userTicketWaitingresponse;

        return $this;
    }

    public function getUserUserTicketReply(): int
    {
        return $this->userUserTicketReply;
    }

    public function setUserUserTicketReply(int $userUserTicketReply): self
    {
        $this->userUserTicketReply = $userUserTicketReply;

        return $this;
    }

    public function getUserTicketDisablereplies(): int
    {
        return $this->userTicketDisablereplies;
    }

    public function setUserTicketDisablereplies(int $userTicketDisablereplies): self
    {
        $this->userTicketDisablereplies = $userTicketDisablereplies;

        return $this;
    }

    public function getOperatorUserTicketReply(): int
    {
        return $this->operatorUserTicketReply;
    }

    public function setOperatorUserTicketReply(int $operatorUserTicketReply): self
    {
        $this->operatorUserTicketReply = $operatorUserTicketReply;

        return $this;
    }
}
