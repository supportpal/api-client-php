<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Department\Operator;
use SupportPal\ApiClient\Model\User\User;
use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * Class self
 * @package SupportPal\ApiClient\Model
 */
class Ticket extends BaseModel
{
    #[SerializedName('department_email_id')]
    private int|null $departmentEmailId;

    #[SerializedName('last_reply_id')]
    private int|null $lastReplyId;

    #[SerializedName('response_email_sent')]
    private bool $responseEmailSent;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('last_reply_time')]
    private int $lastReplyTime;

    /** @var string */
    #[SerializedName('subject')]
    private string $subject;

    #[SerializedName('last_message_by')]
    private int|null $lastMessageBy;

    #[SerializedName('status_id')]
    private int $statusId;

    #[SerializedName('locked')]
    private int $locked;

    #[SerializedName('messages_count')]
    private int|null $messagesCount;

    #[SerializedName('user_id')]
    private int $userId;

    #[SerializedName('paused_time')]
    private int|null $pausedTime;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('internal')]
    private int $internal;

    #[SerializedName('priority_id')]
    private int $priorityId;

    #[SerializedName('deleted_at')]
    private int|null $deletedAt;

    #[SerializedName('sla_plan_id')]
    private int|null $slaPlanId;

    #[SerializedName('department_id')]
    private int $departmentId;

    #[SerializedName('last_reply_by')]
    private int|null $lastReplyBy;

    #[SerializedName('reopened_time')]
    private int|null $reopenedTime;

    #[SerializedName('last_message_id')]
    private int|null $lastMessageId;

    #[SerializedName('notes_count')]
    private int|null $notesCount;

    #[SerializedName('last_message_time')]
    private int $lastMessageTime;

    #[SerializedName('brand_id')]
    private int $brandId;

    #[SerializedName('has_draft')]
    private bool $hasDraft;

    #[SerializedName('resolved_time')]
    private int|null $resolvedTime;

    #[SerializedName('number')]
    private string $number;

    /** @var mixed[] */
    #[SerializedName('cc')]
    private array $cc;

    #[SerializedName('merged')]
    private int $merged;

    #[SerializedName('due_time')]
    private int|null $dueTime;

    #[SerializedName('time_while_paused')]
    private int $timeWhilePaused;

    #[SerializedName('has_attachments')]
    private int|null $hasAttachments;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('channel_id')]
    private int $channelId;

    #[SerializedName('channel')]
    private Channel|null $channel;

    #[SerializedName('department')]
    private Department|null $department;

    /** @var Tag[]|null */
    #[SerializedName('tags')]
    private array|null $tags;

    #[SerializedName('user')]
    private User|null $user;

    #[SerializedName('token')]
    private string $token;

    /** @var Operator[]|null */
    #[SerializedName('watching')]
    private array|null $watching;

    /** @var Operator[]|null */
    #[SerializedName('assigned')]
    private array|null $assigned;

    #[SerializedName('brand')]
    private Brand|null $brand;

    #[SerializedName('last_reply')]
    private Message|null $lastReply;

    #[SerializedName('slaplan')]
    private SlaPlan|null $slaplan;

    /** @var TicketCustomField[]|null */
    #[SerializedName('customfields')]
    private array|null $customfields;

    #[SerializedName('status')]
    private Status|null $status;

    #[SerializedName('priority')]
    private Priority|null $priority;

    #[SerializedName('frontend_url')]
    private string|null $frontendUrl;

    #[SerializedName('operator_url')]
    private string|null $operatorUrl;

    public function getDepartmentEmailId(): ?int
    {
        return $this->departmentEmailId;
    }

    public function setDepartmentEmailId(?int $departmentEmailId): self
    {
        $this->departmentEmailId = $departmentEmailId;

        return $this;
    }

    public function getLastReplyId(): ?int
    {
        return $this->lastReplyId;
    }

    public function setLastReplyId(?int $lastReplyId): self
    {
        $this->lastReplyId = $lastReplyId;

        return $this;
    }

    public function getResponseEmailSent(): bool
    {
        return $this->responseEmailSent;
    }

    public function setResponseEmailSent(bool $responseEmailSent): self
    {
        $this->responseEmailSent = $responseEmailSent;

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

    public function getLastReplyTime(): int
    {
        return $this->lastReplyTime;
    }

    public function setLastReplyTime(int $lastReplyTime): self
    {
        $this->lastReplyTime = $lastReplyTime;

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

    public function getLastMessageBy(): ?int
    {
        return $this->lastMessageBy;
    }

    public function setLastMessageBy(?int $lastMessageBy): self
    {
        $this->lastMessageBy = $lastMessageBy;

        return $this;
    }

    public function getStatusId(): int
    {
        return $this->statusId;
    }

    public function setStatusId(int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

    public function getLocked(): int
    {
        return $this->locked;
    }

    public function setLocked(int $locked): self
    {
        $this->locked = $locked;

        return $this;
    }

    public function getMessagesCount(): ?int
    {
        return $this->messagesCount;
    }

    public function setMessagesCount(?int $messagesCount): self
    {
        $this->messagesCount = $messagesCount;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getPausedTime(): ?int
    {
        return $this->pausedTime;
    }

    public function setPausedTime(?int $pausedTime): self
    {
        $this->pausedTime = $pausedTime;

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

    public function getInternal(): int
    {
        return $this->internal;
    }

    public function setInternal(int $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    public function getPriorityId(): int
    {
        return $this->priorityId;
    }

    public function setPriorityId(int $priorityId): self
    {
        $this->priorityId = $priorityId;

        return $this;
    }

    public function getDeletedAt(): ?int
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?int $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getSlaPlanId(): ?int
    {
        return $this->slaPlanId;
    }

    public function setSlaPlanId(?int $slaPlanId): self
    {
        $this->slaPlanId = $slaPlanId;

        return $this;
    }

    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    public function setDepartmentId(int $departmentId): self
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    public function getLastReplyBy(): ?int
    {
        return $this->lastReplyBy;
    }

    public function setLastReplyBy(?int $lastReplyBy): self
    {
        $this->lastReplyBy = $lastReplyBy;

        return $this;
    }

    public function getReopenedTime(): ?int
    {
        return $this->reopenedTime;
    }

    public function setReopenedTime(?int $reopenedTime): self
    {
        $this->reopenedTime = $reopenedTime;

        return $this;
    }

    public function getLastMessageId(): ?int
    {
        return $this->lastMessageId;
    }

    public function setLastMessageId(?int $lastMessageId): self
    {
        $this->lastMessageId = $lastMessageId;

        return $this;
    }

    public function getNotesCount(): ?int
    {
        return $this->notesCount;
    }

    public function setNotesCount(?int $notesCount): self
    {
        $this->notesCount = $notesCount;

        return $this;
    }

    public function getLastMessageTime(): int
    {
        return $this->lastMessageTime;
    }

    public function setLastMessageTime(int $lastMessageTime): self
    {
        $this->lastMessageTime = $lastMessageTime;

        return $this;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function setBrandId(int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    public function getHasDraft(): bool
    {
        return $this->hasDraft;
    }

    public function setHasDraft(bool $hasDraft): self
    {
        $this->hasDraft = $hasDraft;

        return $this;
    }

    public function getResolvedTime(): ?int
    {
        return $this->resolvedTime;
    }

    public function setResolvedTime(?int $resolvedTime): self
    {
        $this->resolvedTime = $resolvedTime;

        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getCc(): array
    {
        return $this->cc;
    }

    /**
     * @param array<mixed> $cc
     */
    public function setCc(array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    public function getMerged(): int
    {
        return $this->merged;
    }

    public function setMerged(int $merged): self
    {
        $this->merged = $merged;

        return $this;
    }

    public function getDueTime(): ?int
    {
        return $this->dueTime;
    }

    public function setDueTime(?int $dueTime): self
    {
        $this->dueTime = $dueTime;

        return $this;
    }

    public function getTimeWhilePaused(): int
    {
        return $this->timeWhilePaused;
    }

    public function setTimeWhilePaused(int $timeWhilePaused): self
    {
        $this->timeWhilePaused = $timeWhilePaused;

        return $this;
    }

    public function getHasAttachments(): ?int
    {
        return $this->hasAttachments;
    }

    public function setHasAttachments(?int $hasAttachments): self
    {
        $this->hasAttachments = $hasAttachments;

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

    public function getChannelId(): int
    {
        return $this->channelId;
    }

    public function setChannelId(int $channelId): self
    {
        $this->channelId = $channelId;

        return $this;
    }

    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    public function setChannel(?Channel $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return Tag[]|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param Tag[]|null $tags
     */
    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return Operator[]|null
     */
    public function getWatching(): ?array
    {
        return $this->watching;
    }

    /**
     * @param Operator[]|null $watching
     */
    public function setWatching(?array $watching): self
    {
        $this->watching = $watching;

        return $this;
    }

    /**
     * @return Operator[]|null
     */
    public function getAssigned(): ?array
    {
        return $this->assigned;
    }

    /**
     * @param Operator[]|null $assigned
     */
    public function setAssigned(?array $assigned): self
    {
        $this->assigned = $assigned;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getLastReply(): ?Message
    {
        return $this->lastReply;
    }

    public function setLastReply(?Message $lastReply): self
    {
        $this->lastReply = $lastReply;

        return $this;
    }

    public function getSlaplan(): ?SlaPlan
    {
        return $this->slaplan;
    }

    public function setSlaplan(?SlaPlan $slaplan): self
    {
        $this->slaplan = $slaplan;

        return $this;
    }

    /**
     * @return TicketCustomField[]|null
     */
    public function getCustomfields(): ?array
    {
        return $this->customfields;
    }

    /**
     * @param TicketCustomField[]|null $customfields
     */
    public function setCustomfields(?array $customfields): self
    {
        $this->customfields = $customfields;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPriority(): ?Priority
    {
        return $this->priority;
    }

    public function setPriority(?Priority $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getFrontendUrl(): ?string
    {
        return $this->frontendUrl;
    }

    /**
     * @return $this
     */
    public function setFrontendUrl(string $url): self
    {
        $this->frontendUrl = $url;

        return $this;
    }

    public function getOperatorUrl(): ?string
    {
        return $this->operatorUrl;
    }

    /**
     * @return $this
     */
    public function setOperatorUrl(string $url): self
    {
        $this->operatorUrl = $url;

        return $this;
    }
}
