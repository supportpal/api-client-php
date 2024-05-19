<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Department extends BaseModel
{
    #[SerializedName('disable_user_email_replies')]
    private bool $disableUserEmailReplies;

    #[SerializedName('public')]
    private bool $public;

    #[SerializedName('ticket_number_format')]
    private ?string $ticketNumberFormat;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('notify_frontend_ticket')]
    private bool $notifyFrontendTicket;

    #[SerializedName('order')]
    private ?int $order;

    #[SerializedName('description')]
    private ?string $description;

    #[SerializedName('notify_email_ticket')]
    private bool $notifyEmailTicket;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('from_name')]
    private ?string $fromName;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('registered_only')]
    private int $registeredOnly;

    #[SerializedName('parent_id')]
    private ?int $parentId;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('notify_operators')]
    private bool $notifyOperators;

    /** @var string[] */
    #[SerializedName('default_assignedto')]
    private array $defaultAssignedto;

    #[SerializedName('email_templates')]
    private ?EmailTemplates $emailTemplates;

    /** @var Email[]|null */
    #[SerializedName('emails')]
    private ?array $emails;

    /** @var array<mixed>|null */
    #[SerializedName('groups')]
    private ?array $groups;

    /** @var Operator[]|null */
    #[SerializedName('operators')]
    private ?array $operators;

    /** @var DepartmentTranslation[]|null */
    #[SerializedName('translations')]
    private ?array $translations;

    private ?Department $parent;

    public function getDisableUserEmailReplies(): bool
    {
        return $this->disableUserEmailReplies;
    }

    public function setDisableUserEmailReplies(bool $disableUserEmailReplies): self
    {
        $this->disableUserEmailReplies = $disableUserEmailReplies;

        return $this;
    }

    public function getPublic(): bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getTicketNumberFormat(): ?string
    {
        return $this->ticketNumberFormat;
    }

    public function setTicketNumberFormat(?string $ticketNumberFormat): self
    {
        $this->ticketNumberFormat = $ticketNumberFormat;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNotifyFrontendTicket(): bool
    {
        return $this->notifyFrontendTicket;
    }

    public function setNotifyFrontendTicket(bool $notifyFrontendTicket): self
    {
        $this->notifyFrontendTicket = $notifyFrontendTicket;

        return $this;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNotifyEmailTicket(): bool
    {
        return $this->notifyEmailTicket;
    }

    public function setNotifyEmailTicket(bool $notifyEmailTicket): self
    {
        $this->notifyEmailTicket = $notifyEmailTicket;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    public function setFromName(?string $fromName): self
    {
        $this->fromName = $fromName;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRegisteredOnly(): int
    {
        return $this->registeredOnly;
    }

    public function setRegisteredOnly(int $registeredOnly): self
    {
        $this->registeredOnly = $registeredOnly;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getNotifyOperators(): bool
    {
        return $this->notifyOperators;
    }

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
     */
    public function setDefaultAssignedto(array $defaultAssignedto): self
    {
        $this->defaultAssignedto = $defaultAssignedto;

        return $this;
    }

    public function getEmailTemplates(): ?EmailTemplates
    {
        return $this->emailTemplates;
    }

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
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }

    public function getParent(): ?Department
    {
        return $this->parent;
    }

    public function setParent(?Department $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
