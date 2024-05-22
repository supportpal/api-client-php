<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateTicket extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'department',
        'status',
        'priority',
        'subject',
        'text',
    ];

    #[SerializedName('user')]
    protected int|null $user;

    #[SerializedName('on_behalf_of')]
    protected int|null $onBehalfOf;

    #[SerializedName('user_firstname')]
    protected string|null $userFirstname;

    #[SerializedName('user_lastname')]
    protected string|null $userLastname;

    #[SerializedName('user_email')]
    protected string|null $userEmail;

    #[SerializedName('user_organisation')]
    protected string|null $userOrganisation;

    #[SerializedName('user_ip_address')]
    protected string|null $userIpAddress;

    #[SerializedName('department')]
    protected int $department;

    #[SerializedName('brand')]
    protected int|null $brand;

    #[SerializedName('status')]
    protected int $status;

    #[SerializedName('priority')]
    protected int $priority;

    #[SerializedName('internal')]
    protected bool|null $internal;

    #[SerializedName('subject')]
    protected string $subject;

    #[SerializedName('text')]
    protected string $text;

    /** @var int[]|null */
    #[SerializedName('tag')]
    protected array|null $tag;

    /** @var int[]|null */
    #[SerializedName('assignedto')]
    protected array|null $assignedto;

    /** @var int[]|null */
    #[SerializedName('watching')]
    protected array|null $watching;

    /** @var int[]|null */
    #[SerializedName('customfield')]
    protected array|null $customfield;

    /** @var string[]|null */
    #[SerializedName('cc')]
    protected array|null $cc;

    #[SerializedName('send_user_email')]
    protected int|null $sendUserEmail;

    #[SerializedName('send_operators_email')]
    protected int|null $sendOperatorsEmail;

    /** @var string[]|null */
    #[SerializedName('attachment')]
    protected array|null $attachment;

    #[SerializedName('created_at')]
    protected int|null $createdAt;

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function getOnBehalfOf(): ?int
    {
        return $this->onBehalfOf;
    }

    public function getUserFirstname(): ?string
    {
        return $this->userFirstname;
    }

    public function getUserLastname(): ?string
    {
        return $this->userLastname;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function getUserOrganisation(): ?string
    {
        return $this->userOrganisation;
    }

    public function getUserIpAddress(): ?string
    {
        return $this->userIpAddress;
    }

    public function getDepartment(): int
    {
        return $this->department;
    }

    public function getBrand(): ?int
    {
        return $this->brand;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return int[]|null
     */
    public function getTag(): ?array
    {
        return $this->tag;
    }

    /**
     * @return int[]|null
     */
    public function getAssignedto(): ?array
    {
        return $this->assignedto;
    }

    /**
     * @return int[]|null
     */
    public function getWatching(): ?array
    {
        return $this->watching;
    }

    /**
     * @return int[]|null
     */
    public function getCustomfield(): ?array
    {
        return $this->customfield;
    }

    /**
     * @return string[]|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }

    public function getSendUserEmail(): ?int
    {
        return $this->sendUserEmail;
    }

    public function getSendOperatorsEmail(): ?int
    {
        return $this->sendOperatorsEmail;
    }

    /**
     * @return string[]|null
     */
    public function getAttachment(): ?array
    {
        return $this->attachment;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }
}
