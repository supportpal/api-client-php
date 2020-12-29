<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Department\Operator;
use SupportPal\ApiClient\Model\User\User;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class self
 * @package SupportPal\ApiClient\Model
 */
class Ticket extends BaseModel
{
    /**
     * @var int|null
     * @SerializedName("department_email_id")
     */
    private $departmentEmailId;

    /**
     * @var int|null
     * @SerializedName("last_reply_id")
     */
    private $lastReplyId;

    /**
     * @var bool
     * @SerializedName("response_email_sent")
     */
    private $responseEmailSent;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int
     * @SerializedName("last_reply_time")
     */
    private $lastReplyTime;

    /**
     * @var string|'No|Subject'
     * @SerializedName("subject")
     */
    private $subject;

    /**
     * @var int|null
     * @SerializedName("last_message_by")
     */
    private $lastMessageBy;

    /**
     * @var int
     * @SerializedName("status_id")
     */
    private $statusId;

    /**
     * @var int
     * @SerializedName("locked")
     */
    private $locked;

    /**
     * @var int|null
     * @SerializedName("messages_count")
     */
    private $messagesCount;

    /**
     * @var int
     * @SerializedName("user_id")
     */
    private $userId;

    /**
     * @var int|null
     * @SerializedName("paused_time")
     */
    private $pausedTime;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var int
     * @SerializedName("internal")
     */
    private $internal;

    /**
     * @var int
     * @SerializedName("priority_id")
     */
    private $priorityId;

    /**
     * @var int|null
     * @SerializedName("deleted_at")
     */
    private $deletedAt;

    /**
     * @var int|null
     * @SerializedName("sla_plan_id")
     */
    private $slaPlanId;

    /**
     * @var int
     * @SerializedName("department_id")
     */
    private $departmentId;

    /**
     * @var int|null
     * @SerializedName("last_reply_by")
     */
    private $lastReplyBy;

    /**
     * @var int|null
     * @SerializedName("reopened_time")
     */
    private $reopenedTime;

    /**
     * @var int|null
     * @SerializedName("last_message_id")
     */
    private $lastMessageId;

    /**
     * @var int|null
     * @SerializedName("notes_count")
     */
    private $notesCount;

    /**
     * @var int
     * @SerializedName("last_message_time")
     */
    private $lastMessageTime;

    /**
     * @var int
     * @SerializedName("brand_id")
     */
    private $brandId;

    /**
     * @var bool
     * @SerializedName("has_draft")
     */
    private $hasDraft;

    /**
     * @var int|null
     * @SerializedName("resolved_time")
     */
    private $resolvedTime;

    /**
     * @var string
     * @SerializedName("number")
     */
    private $number;

    /**
     * @var array<mixed>
     * @SerializedName("cc")
     */
    private $cc;

    /**
     * @var int
     * @SerializedName("merged")
     */
    private $merged;

    /**
     * @var int|null
     * @SerializedName("due_time")
     */
    private $dueTime;

    /**
     * @var int
     * @SerializedName("time_while_paused")
     */
    private $timeWhilePaused;

    /**
     * @var int|null
     * @SerializedName("has_attachments")
     */
    private $hasAttachments;

    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var int
     * @SerializedName("channel_id")
     */
    private $channelId;

    /**
     * @var Channel|null
     * @SerializedName("channel")
     */
    private $channel;

    /**
     * @var Department|null
     * @SerializedName("department")
     */
    private $department;

    /**
     * @var Tag[]|null
     * @SerializedName("tags")
     */
    private $tags;

    /**
     * @var User|null
     * @SerializedName("user")
     */
    private $user;

    /**
     * @var string
     * @SerializedName("token")
     */
    private $token;

    /**
     * @var Operator[]|null
     * @SerializedName("watching")
     */
    private $watching;

    /**
     * @var Operator[]|null
     * @SerializedName("assigned")
     */
    private $assigned;

    /**
     * @var Brand|null
     * @SerializedName("brand")
     */
    private $brand;

    /**
     * @var Message|null
     * @SerializedName("last_reply")
     */
    private $lastReply;

    /**
     * @var SlaPlan|null
     * @SerializedName("slaplan")
     */
    private $slaplan;

    /**
     * @var TicketCustomField[]|null
     * @SerializedName("customfields")
     */
    private $customfields;

    /**
     * @var Status|null
     * @SerializedName("status")
     */
    private $status;

    /**
     * @var Priority|null
     * @SerializedName("priority")
     */
    private $priority;

    /**
     * @return int|null
     */
    public function getDepartmentEmailId(): ?int
    {
        return $this->departmentEmailId;
    }

    /**
     * @param int|null $departmentEmailId
     * @return self
     */
    public function setDepartmentEmailId(?int $departmentEmailId): self
    {
        $this->departmentEmailId = $departmentEmailId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastReplyId(): ?int
    {
        return $this->lastReplyId;
    }

    /**
     * @param int|null $lastReplyId
     * @return self
     */
    public function setLastReplyId(?int $lastReplyId): self
    {
        $this->lastReplyId = $lastReplyId;

        return $this;
    }

    /**
     * @return bool
     */
    public function getResponseEmailSent(): bool
    {
        return $this->responseEmailSent;
    }

    /**
     * @param bool $responseEmailSent
     * @return self
     */
    public function setResponseEmailSent(bool $responseEmailSent): self
    {
        $this->responseEmailSent = $responseEmailSent;

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
    public function getLastReplyTime(): int
    {
        return $this->lastReplyTime;
    }

    /**
     * @param int $lastReplyTime
     * @return self
     */
    public function setLastReplyTime(int $lastReplyTime): self
    {
        $this->lastReplyTime = $lastReplyTime;

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
     * @return int|null
     */
    public function getLastMessageBy(): ?int
    {
        return $this->lastMessageBy;
    }

    /**
     * @param int|null $lastMessageBy
     * @return self
     */
    public function setLastMessageBy(?int $lastMessageBy): self
    {
        $this->lastMessageBy = $lastMessageBy;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->statusId;
    }

    /**
     * @param int $statusId
     * @return self
     */
    public function setStatusId(int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * @return int
     */
    public function getLocked(): int
    {
        return $this->locked;
    }

    /**
     * @param int $locked
     * @return self
     */
    public function setLocked(int $locked): self
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessagesCount(): ?int
    {
        return $this->messagesCount;
    }

    /**
     * @param int|null $messagesCount
     * @return self
     */
    public function setMessagesCount(?int $messagesCount): self
    {
        $this->messagesCount = $messagesCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return self
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPausedTime(): ?int
    {
        return $this->pausedTime;
    }

    /**
     * @param int|null $pausedTime
     * @return self
     */
    public function setPausedTime(?int $pausedTime): self
    {
        $this->pausedTime = $pausedTime;

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
    public function getInternal(): int
    {
        return $this->internal;
    }

    /**
     * @param int $internal
     * @return self
     */
    public function setInternal(int $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriorityId(): int
    {
        return $this->priorityId;
    }

    /**
     * @param int $priorityId
     * @return self
     */
    public function setPriorityId(int $priorityId): self
    {
        $this->priorityId = $priorityId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDeletedAt(): ?int
    {
        return $this->deletedAt;
    }

    /**
     * @param int|null $deletedAt
     * @return self
     */
    public function setDeletedAt(?int $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSlaPlanId(): ?int
    {
        return $this->slaPlanId;
    }

    /**
     * @param int|null $slaPlanId
     * @return self
     */
    public function setSlaPlanId(?int $slaPlanId): self
    {
        $this->slaPlanId = $slaPlanId;

        return $this;
    }

    /**
     * @return int
     */
    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    /**
     * @param int $departmentId
     * @return self
     */
    public function setDepartmentId(int $departmentId): self
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastReplyBy(): ?int
    {
        return $this->lastReplyBy;
    }

    /**
     * @param int|null $lastReplyBy
     * @return self
     */
    public function setLastReplyBy(?int $lastReplyBy): self
    {
        $this->lastReplyBy = $lastReplyBy;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getReopenedTime(): ?int
    {
        return $this->reopenedTime;
    }

    /**
     * @param int|null $reopenedTime
     * @return self
     */
    public function setReopenedTime(?int $reopenedTime): self
    {
        $this->reopenedTime = $reopenedTime;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastMessageId(): ?int
    {
        return $this->lastMessageId;
    }

    /**
     * @param int|null $lastMessageId
     * @return self
     */
    public function setLastMessageId(?int $lastMessageId): self
    {
        $this->lastMessageId = $lastMessageId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNotesCount(): ?int
    {
        return $this->notesCount;
    }

    /**
     * @param int|null $notesCount
     * @return self
     */
    public function setNotesCount(?int $notesCount): self
    {
        $this->notesCount = $notesCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getLastMessageTime(): int
    {
        return $this->lastMessageTime;
    }

    /**
     * @param int $lastMessageTime
     * @return self
     */
    public function setLastMessageTime(int $lastMessageTime): self
    {
        $this->lastMessageTime = $lastMessageTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     * @return self
     */
    public function setBrandId(int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHasDraft(): bool
    {
        return $this->hasDraft;
    }

    /**
     * @param bool $hasDraft
     * @return self
     */
    public function setHasDraft(bool $hasDraft): self
    {
        $this->hasDraft = $hasDraft;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getResolvedTime(): ?int
    {
        return $this->resolvedTime;
    }

    /**
     * @param int|null $resolvedTime
     * @return self
     */
    public function setResolvedTime(?int $resolvedTime): self
    {
        $this->resolvedTime = $resolvedTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return self
     */
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
     * @return self
     */
    public function setCc(array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @return int
     */
    public function getMerged(): int
    {
        return $this->merged;
    }

    /**
     * @param int $merged
     * @return self
     */
    public function setMerged(int $merged): self
    {
        $this->merged = $merged;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDueTime(): ?int
    {
        return $this->dueTime;
    }

    /**
     * @param int|null $dueTime
     * @return self
     */
    public function setDueTime(?int $dueTime): self
    {
        $this->dueTime = $dueTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimeWhilePaused(): int
    {
        return $this->timeWhilePaused;
    }

    /**
     * @param int $timeWhilePaused
     * @return self
     */
    public function setTimeWhilePaused(int $timeWhilePaused): self
    {
        $this->timeWhilePaused = $timeWhilePaused;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHasAttachments(): ?int
    {
        return $this->hasAttachments;
    }

    /**
     * @param int|null $hasAttachments
     * @return self
     */
    public function setHasAttachments(?int $hasAttachments): self
    {
        $this->hasAttachments = $hasAttachments;

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
     * @return int
     */
    public function getChannelId(): int
    {
        return $this->channelId;
    }

    /**
     * @param int $channelId
     * @return self
     */
    public function setChannelId(int $channelId): self
    {
        $this->channelId = $channelId;

        return $this;
    }

    /**
     * @return Channel|null
     */
    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    /**
     * @param Channel|null $channel
     * @return self
     */
    public function setChannel(?Channel $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @return Department|null
     */
    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    /**
     * @param Department|null $department
     * @return self
     */
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
     * @return self
     */
    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return self
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return self
     */
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
     * @return self
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
     * @return self
     */
    public function setAssigned(?array $assigned): self
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * @return Brand|null
     */
    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand|null $brand
     * @return self
     */
    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getLastReply(): ?Message
    {
        return $this->lastReply;
    }

    /**
     * @param Message|null $lastReply
     * @return self
     */
    public function setLastReply(?Message $lastReply): self
    {
        $this->lastReply = $lastReply;

        return $this;
    }

    /**
     * @return SlaPlan|null
     */
    public function getSlaplan(): ?SlaPlan
    {
        return $this->slaplan;
    }

    /**
     * @param SlaPlan|null $slaplan
     * @return self
     */
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
     * @return self
     */
    public function setCustomfields(?array $customfields): self
    {
        $this->customfields = $customfields;

        return $this;
    }

    /**
     * @return Status|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * @param Status|null $status
     * @return self
     */
    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Priority|null
     */
    public function getPriority(): ?Priority
    {
        return $this->priority;
    }

    /**
     * @param Priority|null $priority
     * @return self
     */
    public function setPriority(?Priority $priority): self
    {
        $this->priority = $priority;

        return $this;
    }
}
