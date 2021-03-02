<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class EmailTemplates extends BaseModel
{
    /**
     * @var int|null
     * @SerializedName("operator_department_changed")
     */
    private $operatorDepartmentChanged;

    /**
     * @var int|null
     * @SerializedName("operator_internal_opened")
     */
    private $operatorInternalOpened;

    /**
     * @var int|null
     * @SerializedName("user_ticket_locked")
     */
    private $userTicketLocked;

    /**
     * @var int|null
     * @SerializedName("user_ticket_reply")
     */
    private $userTicketReply;

    /**
     * @var int|null
     * @SerializedName("operator_assigned")
     */
    private $operatorAssigned;

    /**
     * @var int|null
     * @SerializedName("operator_ticket_note")
     */
    private $operatorTicketNote;

    /**
     * @var int|null
     * @SerializedName("user_ticket_opened")
     */
    private $userTicketOpened;

    /**
     * @var int|null
     * @SerializedName("user_ticket_operatorclose")
     */
    private $userTicketOperatorclose;

    /**
     * @var int|null
     * @SerializedName("operator_ticket_opened")
     */
    private $operatorTicketOpened;

    /**
     * @var int|null
     * @SerializedName("user_ticket_registeredonly")
     */
    private $userTicketRegisteredonly;

    /**
     * @var int|null
     * @SerializedName("user_ticket_autoclose")
     */
    private $userTicketAutoclose;

    /**
     * @var int|null
     * @SerializedName("user_email_attachmentrejected")
     */
    private $userEmailAttachmentrejected;

    /**
     * @var int|null
     * @SerializedName("operator_operator_ticket_reply")
     */
    private $operatorOperatorTicketReply;

    /**
     * @var int|null
     * @SerializedName("user_ticket_waitingresponse")
     */
    private $userTicketWaitingresponse;

    /**
     * @var int|null
     * @SerializedName("user_user_ticket_reply")
     */
    private $userUserTicketReply;

    /**
     * @var int|null
     * @SerializedName("user_ticket_disablereplies")
     */
    private $userTicketDisablereplies;

    /**
     * @var int|null
     * @SerializedName("operator_user_ticket_reply")
     */
    private $operatorUserTicketReply;

    /**
     * @return int|null
     */
    public function getOperatorDepartmentChanged(): ?int
    {
        return $this->operatorDepartmentChanged;
    }

    /**
     * @param int|null $operatorDepartmentChanged
     * @return self
     */
    public function setOperatorDepartmentChanged(?int $operatorDepartmentChanged): self
    {
        $this->operatorDepartmentChanged = $operatorDepartmentChanged;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOperatorInternalOpened(): ?int
    {
        return $this->operatorInternalOpened;
    }

    /**
     * @param int|null $operatorInternalOpened
     * @return self
     */
    public function setOperatorInternalOpened(?int $operatorInternalOpened): self
    {
        $this->operatorInternalOpened = $operatorInternalOpened;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserTicketLocked(): ?int
    {
        return $this->userTicketLocked;
    }

    /**
     * @param int|null $userTicketLocked
     * @return self
     */
    public function setUserTicketLocked(?int $userTicketLocked): self
    {
        $this->userTicketLocked = $userTicketLocked;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserTicketReply(): ?int
    {
        return $this->userTicketReply;
    }

    /**
     * @param int|null $userTicketReply
     * @return self
     */
    public function setUserTicketReply(?int $userTicketReply): self
    {
        $this->userTicketReply = $userTicketReply;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOperatorAssigned(): ?int
    {
        return $this->operatorAssigned;
    }

    /**
     * @param int|null $operatorAssigned
     * @return self
     */
    public function setOperatorAssigned(?int $operatorAssigned): self
    {
        $this->operatorAssigned = $operatorAssigned;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOperatorTicketNote(): ?int
    {
        return $this->operatorTicketNote;
    }

    /**
     * @param int|null $operatorTicketNote
     * @return self
     */
    public function setOperatorTicketNote(?int $operatorTicketNote): self
    {
        $this->operatorTicketNote = $operatorTicketNote;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserTicketOpened(): ?int
    {
        return $this->userTicketOpened;
    }

    /**
     * @param int|null $userTicketOpened
     * @return self
     */
    public function setUserTicketOpened(?int $userTicketOpened): self
    {
        $this->userTicketOpened = $userTicketOpened;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserTicketOperatorclose(): ?int
    {
        return $this->userTicketOperatorclose;
    }

    /**
     * @param int|null $userTicketOperatorclose
     * @return self
     */
    public function setUserTicketOperatorclose(?int $userTicketOperatorclose): self
    {
        $this->userTicketOperatorclose = $userTicketOperatorclose;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOperatorTicketOpened(): ?int
    {
        return $this->operatorTicketOpened;
    }

    /**
     * @param int|null $operatorTicketOpened
     * @return self
     */
    public function setOperatorTicketOpened(?int $operatorTicketOpened): self
    {
        $this->operatorTicketOpened = $operatorTicketOpened;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserTicketRegisteredonly(): ?int
    {
        return $this->userTicketRegisteredonly;
    }

    /**
     * @param int|null $userTicketRegisteredonly
     * @return self
     */
    public function setUserTicketRegisteredonly(?int $userTicketRegisteredonly): self
    {
        $this->userTicketRegisteredonly = $userTicketRegisteredonly;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserTicketAutoclose(): ?int
    {
        return $this->userTicketAutoclose;
    }

    /**
     * @param int|null $userTicketAutoclose
     * @return self
     */
    public function setUserTicketAutoclose(?int $userTicketAutoclose): self
    {
        $this->userTicketAutoclose = $userTicketAutoclose;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserEmailAttachmentrejected(): ?int
    {
        return $this->userEmailAttachmentrejected;
    }

    /**
     * @param int|null $userEmailAttachmentrejected
     * @return self
     */
    public function setUserEmailAttachmentrejected(?int $userEmailAttachmentrejected): self
    {
        $this->userEmailAttachmentrejected = $userEmailAttachmentrejected;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOperatorOperatorTicketReply(): ?int
    {
        return $this->operatorOperatorTicketReply;
    }

    /**
     * @param int|null $operatorOperatorTicketReply
     * @return self
     */
    public function setOperatorOperatorTicketReply(?int $operatorOperatorTicketReply): self
    {
        $this->operatorOperatorTicketReply = $operatorOperatorTicketReply;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserTicketWaitingresponse(): ?int
    {
        return $this->userTicketWaitingresponse;
    }

    /**
     * @param int|null $userTicketWaitingresponse
     * @return self
     */
    public function setUserTicketWaitingresponse(?int $userTicketWaitingresponse): self
    {
        $this->userTicketWaitingresponse = $userTicketWaitingresponse;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserUserTicketReply(): ?int
    {
        return $this->userUserTicketReply;
    }

    /**
     * @param int|null $userUserTicketReply
     * @return self
     */
    public function setUserUserTicketReply(?int $userUserTicketReply): self
    {
        $this->userUserTicketReply = $userUserTicketReply;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserTicketDisablereplies(): ?int
    {
        return $this->userTicketDisablereplies;
    }

    /**
     * @param int|null $userTicketDisablereplies
     * @return self
     */
    public function setUserTicketDisablereplies(?int $userTicketDisablereplies): self
    {
        $this->userTicketDisablereplies = $userTicketDisablereplies;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOperatorUserTicketReply(): ?int
    {
        return $this->operatorUserTicketReply;
    }

    /**
     * @param int|null $operatorUserTicketReply
     * @return self
     */
    public function setOperatorUserTicketReply(?int $operatorUserTicketReply): self
    {
        $this->operatorUserTicketReply = $operatorUserTicketReply;

        return $this;
    }
}
