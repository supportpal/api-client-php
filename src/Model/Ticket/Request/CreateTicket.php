<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateTicket extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'department',
        'status',
        'priority',
        'subject',
        'text',
    ];

    /**
     * @var int|null
     * @SerializedName("user")
     */
    private $user;

    /**
     * @var int|null
     * @SerializedName("on_behalf_of")
     */
    private $onBehalfOf;

    /**
     * @var string|null
     * @SerializedName("user_firstname")
     */
    private $userFirstname;

    /**
     * @var string|null
     * @SerializedName("user_lastname")
     */
    private $userLastname;

    /**
     * @var string|null
     * @SerializedName("user_email")
     */
    private $userEmail;

    /**
     * @var string|null
     * @SerializedName("user_organisation")
     */
    private $userOrganisation;

    /**
     * @var string|null
     * @SerializedName("user_ip_address")
     */
    private $userIpAddress;

    /**
     * @var int
     * @SerializedName("department")
     */
    private $department;

    /**
     * @var int|null
     * @SerializedName("brand")
     */
    private $brand;

    /**
     * @var int
     * @SerializedName("status")
     */
    private $status;

    /**
     * @var int
     * @SerializedName("priority")
     */
    private $priority;

    /**
     * @var bool|null
     * @SerializedName("internal")
     */
    private $internal;

    /**
     * @var string
     * @SerializedName("subject")
     */
    private $subject;

    /**
     * @var string
     * @SerializedName("text")
     */
    private $text;

    /**
     * @var int[]|null
     * @SerializedName("tag")
     */
    private $tag;

    /**
     * @var int[]|null
     * @SerializedName("assignedto")
     */
    private $assignedto;

    /**
     * @var int[]|null
     * @SerializedName("watching")
     */
    private $watching;

    /**
     * @var int[]|null
     * @SerializedName("customfield")
     */
    private $customfield;

    /**
     * @var string[]|null
     * @SerializedName("cc")
     */
    private $cc;

    /**
     * @var int|null
     * @SerializedName("send_user_email")
     */
    private $sendUserEmail;

    /**
     * @var int|null
     * @SerializedName("send_operators_email")
     */
    private $sendOperatorsEmail;

    /**
     * @var string[]|null
     * @SerializedName("attachment")
     */
    private $attachment;

    /**
     * @var int|null
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @return int|null
     */
    public function getUser(): ?int
    {
        return $this->user;
    }

    /**
     * @param int|null $user
     * @return self
     */
    public function setUser(?int $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOnBehalfOf(): ?int
    {
        return $this->onBehalfOf;
    }

    /**
     * @param int|null $onBehalfOf
     * @return self
     */
    public function setOnBehalfOf(?int $onBehalfOf): self
    {
        $this->onBehalfOf = $onBehalfOf;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserFirstname(): ?string
    {
        return $this->userFirstname;
    }

    /**
     * @param string|null $userFirstname
     * @return self
     */
    public function setUserFirstname(?string $userFirstname): self
    {
        $this->userFirstname = $userFirstname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserLastname(): ?string
    {
        return $this->userLastname;
    }

    /**
     * @param string|null $userLastname
     * @return self
     */
    public function setUserLastname(?string $userLastname): self
    {
        $this->userLastname = $userLastname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    /**
     * @param string|null $userEmail
     * @return self
     */
    public function setUserEmail(?string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserOrganisation(): ?string
    {
        return $this->userOrganisation;
    }

    /**
     * @param string|null $userOrganisation
     * @return self
     */
    public function setUserOrganisation(?string $userOrganisation): self
    {
        $this->userOrganisation = $userOrganisation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserIpAddress(): ?string
    {
        return $this->userIpAddress;
    }

    /**
     * @param string|null $userIpAddress
     * @return self
     */
    public function setUserIpAddress(?string $userIpAddress): self
    {
        $this->userIpAddress = $userIpAddress;

        return $this;
    }

    /**
     * @return int
     */
    public function getDepartment(): int
    {
        return $this->department;
    }

    /**
     * @param int $department
     * @return self
     */
    public function setDepartment(int $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBrand(): ?int
    {
        return $this->brand;
    }

    /**
     * @param int|null $brand
     * @return self
     */
    public function setBrand(?int $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return self
     */
    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    /**
     * @param bool|null $internal
     * @return self
     */
    public function setInternal(?bool $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return self
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
     */
    public function setCc(?array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSendUserEmail(): ?int
    {
        return $this->sendUserEmail;
    }

    /**
     * @param int|null $sendUserEmail
     * @return self
     */
    public function setSendUserEmail(?int $sendUserEmail): self
    {
        $this->sendUserEmail = $sendUserEmail;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSendOperatorsEmail(): ?int
    {
        return $this->sendOperatorsEmail;
    }

    /**
     * @param int|null $sendOperatorsEmail
     * @return self
     */
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
     * @return self
     */
    public function setAttachment(?array $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param int|null $createdAt
     * @return self
     */
    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
