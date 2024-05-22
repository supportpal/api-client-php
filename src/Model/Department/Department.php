<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Department extends BaseModel
{
    #[SerializedName('disable_user_email_replies')]
    protected bool $disableUserEmailReplies;

    #[SerializedName('public')]
    protected bool $public;

    #[SerializedName('ticket_number_format')]
    protected ?string $ticketNumberFormat;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('notify_frontend_ticket')]
    protected bool $notifyFrontendTicket;

    #[SerializedName('order')]
    protected ?int $order;

    #[SerializedName('description')]
    protected ?string $description;

    #[SerializedName('notify_email_ticket')]
    protected bool $notifyEmailTicket;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('from_name')]
    protected ?string $fromName;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('registered_only')]
    protected int $registeredOnly;

    #[SerializedName('parent_id')]
    protected ?int $parentId;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('notify_operators')]
    protected bool $notifyOperators;

    /** @var string[] */
    #[SerializedName('default_assignedto')]
    protected array $defaultAssignedto;

    #[SerializedName('email_templates')]
    protected ?EmailTemplates $emailTemplates;

    /** @var Email[]|null */
    #[SerializedName('emails')]
    protected ?array $emails;

    /** @var array<mixed>|null */
    #[SerializedName('groups')]
    protected ?array $groups;

    /** @var Operator[]|null */
    #[SerializedName('operators')]
    protected ?array $operators;

    /** @var DepartmentTranslation[]|null */
    #[SerializedName('translations')]
    protected ?array $translations;

    protected ?Department $parent = null;

    public function getDisableUserEmailReplies(): bool
    {
        return $this->disableUserEmailReplies;
    }

    public function getPublic(): bool
    {
        return $this->public;
    }

    public function getTicketNumberFormat(): ?string
    {
        return $this->ticketNumberFormat;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNotifyFrontendTicket(): bool
    {
        return $this->notifyFrontendTicket;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getNotifyEmailTicket(): bool
    {
        return $this->notifyEmailTicket;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getRegisteredOnly(): int
    {
        return $this->registeredOnly;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getNotifyOperators(): bool
    {
        return $this->notifyOperators;
    }

    /**
     * @return string[]
     */
    public function getDefaultAssignedto(): array
    {
        return $this->defaultAssignedto;
    }

    public function getEmailTemplates(): ?EmailTemplates
    {
        return $this->emailTemplates;
    }

    /**
     * @return Email[]|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }

    /**
     * @return array<mixed>|null
     */
    public function getGroups(): ?array
    {
        return $this->groups;
    }

    /**
     * @return Operator[]|null
     */
    public function getOperators(): ?array
    {
        return $this->operators;
    }

    /**
     * @return DepartmentTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    public function getParent(): ?Department
    {
        return $this->parent;
    }
}
