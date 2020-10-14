<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Department extends BaseModel
{
    /**
     * @var int
     * @SerializedName("disable_user_email_replies")
     */
    private $disableUserEmailReplies;

    /**
     * @var int
     * @SerializedName("public")
     */
    private $public;

    /**
     * @var string|null
     * @SerializedName("ticket_number_format")
     */
    private $ticketNumberFormat;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("notify_frontend_ticket")
     */
    private $notifyFrontendTicket;

    /**
     * @var int|null
     * @SerializedName("order")
     */
    private $order;

    /**
     * @var string|null
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var int
     * @SerializedName("notify_email_ticket")
     */
    private $notifyEmailTicket;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("from_name")
     */
    private $fromName;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var int
     * @SerializedName("registered_only")
     */
    private $registeredOnly;

    /**
     * @var int|null
     * @SerializedName("parent_id")
     */
    private $parentId;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int
     * @SerializedName("notify_operators")
     */
    private $notifyOperators;

    /**
     * @var Operator[]
     * @SerializedName("default_assignedto")
     */
    private $defaultAssignedto;

    /**
     * @var EmailTemplates|null
     * @SerializedName("email_templates")
     */
    private $emailTemplates;

    /**
     * @var Email[]|null
     * @SerializedName("emails")
     */
    private $emails;

    /**
     * @var array<mixed>|null
     * @SerializedName("groups")
     */
    private $groups;

    /**
     * @var Operator[]|null
     * @SerializedName("operators")
     */
    private $operators;

    /**
     * @var array<mixed>|null
     * @SerializedName("pivot")
     */
    private $pivot;

    /**
     * @return int
     */
    public function getDisableUserEmailReplies(): int
    {
        return $this->disableUserEmailReplies;
    }

    /**
     * @param int $disableUserEmailReplies
     * @return self
     */
    public function setDisableUserEmailReplies(int $disableUserEmailReplies): self
    {
        $this->disableUserEmailReplies = $disableUserEmailReplies;

        return $this;
    }

    /**
     * @return int
     */
    public function getPublic(): int
    {
        return $this->public;
    }

    /**
     * @param int $public
     * @return self
     */
    public function setPublic(int $public): self
    {
        $this->public = $public;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTicketNumberFormat(): ?string
    {
        return $this->ticketNumberFormat;
    }

    /**
     * @param string|null $ticketNumberFormat
     * @return self
     */
    public function setTicketNumberFormat(?string $ticketNumberFormat): self
    {
        $this->ticketNumberFormat = $ticketNumberFormat;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getNotifyFrontendTicket(): int
    {
        return $this->notifyFrontendTicket;
    }

    /**
     * @param int $notifyFrontendTicket
     * @return self
     */
    public function setNotifyFrontendTicket(int $notifyFrontendTicket): self
    {
        $this->notifyFrontendTicket = $notifyFrontendTicket;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * @param int|null $order
     * @return self
     */
    public function setOrder(?int $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getNotifyEmailTicket(): int
    {
        return $this->notifyEmailTicket;
    }

    /**
     * @param int $notifyEmailTicket
     * @return self
     */
    public function setNotifyEmailTicket(int $notifyEmailTicket): self
    {
        $this->notifyEmailTicket = $notifyEmailTicket;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    /**
     * @param string|null $fromName
     * @return self
     */
    public function setFromName(?string $fromName): self
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return self
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getRegisteredOnly(): int
    {
        return $this->registeredOnly;
    }

    /**
     * @param int $registeredOnly
     * @return self
     */
    public function setRegisteredOnly(int $registeredOnly): self
    {
        $this->registeredOnly = $registeredOnly;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @param int|null $parentId
     * @return self
     */
    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return self
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getNotifyOperators(): int
    {
        return $this->notifyOperators;
    }

    /**
     * @param int $notifyOperators
     * @return self
     */
    public function setNotifyOperators(int $notifyOperators): self
    {
        $this->notifyOperators = $notifyOperators;

        return $this;
    }

    /**
     * @return Operator[]
     */
    public function getDefaultAssignedto(): array
    {
        return $this->defaultAssignedto;
    }

    /**
     * @param Operator[] $defaultAssignedto
     * @return self
     */
    public function setDefaultAssignedto(array $defaultAssignedto): self
    {
        $this->defaultAssignedto = $defaultAssignedto;

        return $this;
    }

    /**
     * @return EmailTemplates|null
     */
    public function getEmailTemplates(): ?EmailTemplates
    {
        return $this->emailTemplates;
    }

    /**
     * @param EmailTemplates|null $emailTemplates
     * @return self
     */
    public function setEmailTemplates(?EmailTemplates $emailTemplates): self
    {
        $this->emailTemplates = $emailTemplates;

        return $this;
    }

    /**
     * @return Email[]|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }

    /**
     * @param Email[]|null $emails
     * @return self
     */
    public function setEmails(?array $emails): self
    {
        $this->emails = $emails;

        return $this;
    }

    /**
     * @return array<mixed>|null
     */
    public function getGroups(): ?array
    {
        return $this->groups;
    }

    /**
     * @param array<mixed>|null $groups
     * @return self
     */
    public function setGroups(?array $groups): self
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * @return Operator[]|null
     */
    public function getOperators(): ?array
    {
        return $this->operators;
    }

    /**
     * @param Operator[]|null $operators
     * @return self
     */
    public function setOperators(?array $operators): self
    {
        $this->operators = $operators;

        return $this;
    }

    /**
     * @return array<mixed>|null
     */
    public function getPivot(): ?array
    {
        return $this->pivot;
    }

    /**
     * @param array<mixed>|null $pivot
     * @return self
     */
    public function setPivot(?array $pivot): self
    {
        $this->pivot = $pivot;

        return $this;
    }
}
