<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Department extends BaseModel
{
    /**
     * @var bool
     * @SerializedName("disable_user_email_replies")
     */
    private $disableUserEmailReplies;

    /**
     * @var bool
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
     * @var bool
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
     * @var bool
     * @SerializedName("notify_email_ticket")
     */
    private $notifyEmailTicket;

    /**
     * @var int
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
     * @var bool
     * @SerializedName("notify_operators")
     */
    private $notifyOperators;

    /**
     * @var string[]
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
     * @var DepartmentTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

    /** @var Department|null */
    private $parent;

    /**
     * @return bool
     */
    public function getDisableUserEmailReplies(): bool
    {
        return $this->disableUserEmailReplies;
    }

    /**
     * @param bool $disableUserEmailReplies
     * @return self
     */
    public function setDisableUserEmailReplies(bool $disableUserEmailReplies): self
    {
        $this->disableUserEmailReplies = $disableUserEmailReplies;

        return $this;
    }

    /**
     * @return bool
     */
    public function getPublic(): bool
    {
        return $this->public;
    }

    /**
     * @param bool $public
     * @return self
     */
    public function setPublic(bool $public): self
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
     * @return bool
     */
    public function getNotifyFrontendTicket(): bool
    {
        return $this->notifyFrontendTicket;
    }

    /**
     * @param bool $notifyFrontendTicket
     * @return self
     */
    public function setNotifyFrontendTicket(bool $notifyFrontendTicket): self
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
     * @return bool
     */
    public function getNotifyEmailTicket(): bool
    {
        return $this->notifyEmailTicket;
    }

    /**
     * @param bool $notifyEmailTicket
     * @return self
     */
    public function setNotifyEmailTicket(bool $notifyEmailTicket): self
    {
        $this->notifyEmailTicket = $notifyEmailTicket;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
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
     * @return bool
     */
    public function getNotifyOperators(): bool
    {
        return $this->notifyOperators;
    }

    /**
     * @param bool $notifyOperators
     * @return self
     */
    public function setNotifyOperators(bool $notifyOperators): self
    {
        $this->notifyOperators = $notifyOperators;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getDefaultAssignedto(): array
    {
        return $this->defaultAssignedto;
    }

    /**
     * @param string[] $defaultAssignedto
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
     * @return DepartmentTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param DepartmentTranslation[]|null $translations
     * @return self
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * @return Department|null
     */
    public function getParent(): ?Department
    {
        return $this->parent;
    }

    /**
     * @param Department|null $parent
     * @return self
     */
    public function setParent(?Department $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
