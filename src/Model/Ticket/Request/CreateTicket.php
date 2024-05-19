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
    private int|null $user;

    #[SerializedName('on_behalf_of')]
    private int|null $onBehalfOf;

    #[SerializedName('user_firstname')]
    private string|null $userFirstname;

    #[SerializedName('user_lastname')]
    private string|null $userLastname;

    #[SerializedName('user_email')]
    private string|null $userEmail;

    #[SerializedName('user_organisation')]
    private string|null $userOrganisation;

    #[SerializedName('user_ip_address')]
    private string|null $userIpAddress;

    #[SerializedName('department')]
    private int $department;

    #[SerializedName('brand')]
    private int|null $brand;

    #[SerializedName('status')]
    private int $status;

    #[SerializedName('priority')]
    private int $priority;

    #[SerializedName('internal')]
    private bool|null $internal;

    #[SerializedName('subject')]
    private string $subject;

    #[SerializedName('text')]
    private string $text;

    /** @var int[]|null */
    #[SerializedName('tag')]
    private array|null $tag;

    /** @var int[]|null */
    #[SerializedName('assignedto')]
    private array|null $assignedto;

    /** @var int[]|null */
    #[SerializedName('watching')]
    private array|null $watching;

    /** @var int[]|null */
    #[SerializedName('customfield')]
    private array|null $customfield;

    /** @var string[]|null */
    #[SerializedName('cc')]
    private array|null $cc;

    #[SerializedName('send_user_email')]
    private int|null $sendUserEmail;

    #[SerializedName('send_operators_email')]
    private int|null $sendOperatorsEmail;

    /** @var string[]|null */
    #[SerializedName('attachment')]
    private array|null $attachment;

    #[SerializedName('created_at')]
    private int|null $createdAt;

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(?int $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOnBehalfOf(): ?int
    {
        return $this->onBehalfOf;
    }

    public function setOnBehalfOf(?int $onBehalfOf): self
    {
        $this->onBehalfOf = $onBehalfOf;

        return $this;
    }

    public function getUserFirstname(): ?string
    {
        return $this->userFirstname;
    }

    public function setUserFirstname(?string $userFirstname): self
    {
        $this->userFirstname = $userFirstname;

        return $this;
    }

    public function getUserLastname(): ?string
    {
        return $this->userLastname;
    }

    public function setUserLastname(?string $userLastname): self
    {
        $this->userLastname = $userLastname;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function setUserEmail(?string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    public function getUserOrganisation(): ?string
    {
        return $this->userOrganisation;
    }

    public function setUserOrganisation(?string $userOrganisation): self
    {
        $this->userOrganisation = $userOrganisation;

        return $this;
    }

    public function getUserIpAddress(): ?string
    {
        return $this->userIpAddress;
    }

    public function setUserIpAddress(?string $userIpAddress): self
    {
        $this->userIpAddress = $userIpAddress;

        return $this;
    }

    public function getDepartment(): int
    {
        return $this->department;
    }

    public function setDepartment(int $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getBrand(): ?int
    {
        return $this->brand;
    }

    public function setBrand(?int $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    public function setInternal(?bool $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getTag(): ?array
    {
        return $this->tag;
    }

    /**
     * @param int[]|null $tag
     */
    public function setTag(?array $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getAssignedto(): ?array
    {
        return $this->assignedto;
    }

    /**
     * @param int[]|null $assignedto
     */
    public function setAssignedto(?array $assignedto): self
    {
        $this->assignedto = $assignedto;

        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getWatching(): ?array
    {
        return $this->watching;
    }

    /**
     * @param int[]|null $watching
     */
    public function setWatching(?array $watching): self
    {
        $this->watching = $watching;

        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getCustomfield(): ?array
    {
        return $this->customfield;
    }

    /**
     * @param int[]|null $customfield
     */
    public function setCustomfield(?array $customfield): self
    {
        $this->customfield = $customfield;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }

    /**
     * @param string[]|null $cc
     */
    public function setCc(?array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    public function getSendUserEmail(): ?int
    {
        return $this->sendUserEmail;
    }

    public function setSendUserEmail(?int $sendUserEmail): self
    {
        $this->sendUserEmail = $sendUserEmail;

        return $this;
    }

    public function getSendOperatorsEmail(): ?int
    {
        return $this->sendOperatorsEmail;
    }

    public function setSendOperatorsEmail(?int $sendOperatorsEmail): self
    {
        $this->sendOperatorsEmail = $sendOperatorsEmail;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getAttachment(): ?array
    {
        return $this->attachment;
    }

    /**
     * @param string[]|null $attachment
     */
    public function setAttachment(?array $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
