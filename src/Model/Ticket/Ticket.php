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
    protected int|null $departmentEmailId;

    #[SerializedName('last_reply_id')]
    protected int|null $lastReplyId;

    #[SerializedName('response_email_sent')]
    protected bool $responseEmailSent;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('last_reply_time')]
    protected int $lastReplyTime;

    /** @var string */
    #[SerializedName('subject')]
    protected string $subject;

    #[SerializedName('last_message_by')]
    protected int|null $lastMessageBy;

    #[SerializedName('status_id')]
    protected int $statusId;

    #[SerializedName('locked')]
    protected int $locked;

    #[SerializedName('messages_count')]
    protected int|null $messagesCount;

    #[SerializedName('user_id')]
    protected int $userId;

    #[SerializedName('paused_time')]
    protected int|null $pausedTime;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('internal')]
    protected int $internal;

    #[SerializedName('priority_id')]
    protected int $priorityId;

    #[SerializedName('deleted_at')]
    protected int|null $deletedAt;

    #[SerializedName('sla_plan_id')]
    protected int|null $slaPlanId;

    #[SerializedName('department_id')]
    protected int $departmentId;

    #[SerializedName('last_reply_by')]
    protected int|null $lastReplyBy;

    #[SerializedName('reopened_time')]
    protected int|null $reopenedTime;

    #[SerializedName('last_message_id')]
    protected int|null $lastMessageId;

    #[SerializedName('notes_count')]
    protected int|null $notesCount;

    #[SerializedName('last_message_time')]
    protected int $lastMessageTime;

    #[SerializedName('brand_id')]
    protected int $brandId;

    #[SerializedName('has_draft')]
    protected bool $hasDraft;

    #[SerializedName('resolved_time')]
    protected int|null $resolvedTime;

    #[SerializedName('number')]
    protected string $number;

    /** @var mixed[] */
    #[SerializedName('cc')]
    protected array $cc;

    #[SerializedName('merged')]
    protected int $merged;

    #[SerializedName('due_time')]
    protected int|null $dueTime;

    #[SerializedName('time_while_paused')]
    protected int $timeWhilePaused;

    #[SerializedName('has_attachments')]
    protected int|null $hasAttachments;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('channel_id')]
    protected int $channelId;

    #[SerializedName('channel')]
    protected Channel|null $channel;

    #[SerializedName('department')]
    protected Department|null $department;

    /** @var Tag[]|null */
    #[SerializedName('tags')]
    protected array|null $tags;

    #[SerializedName('user')]
    protected User|null $user;

    #[SerializedName('token')]
    protected string $token;

    /** @var Operator[]|null */
    #[SerializedName('watching')]
    protected array|null $watching;

    /** @var Operator[]|null */
    #[SerializedName('assigned')]
    protected array|null $assigned;

    #[SerializedName('brand')]
    protected Brand|null $brand;

    #[SerializedName('last_reply')]
    protected Message|null $lastReply;

    #[SerializedName('slaplan')]
    protected SlaPlan|null $slaplan;

    /** @var TicketCustomField[]|null */
    #[SerializedName('customfields')]
    protected array|null $customfields;

    #[SerializedName('status')]
    protected Status|null $status;

    #[SerializedName('priority')]
    protected Priority|null $priority;

    #[SerializedName('frontend_url')]
    protected string|null $frontendUrl;

    #[SerializedName('operator_url')]
    protected string|null $operatorUrl;

    public function getDepartmentEmailId(): ?int
    {
        return $this->departmentEmailId;
    }

    public function getLastReplyId(): ?int
    {
        return $this->lastReplyId;
    }

    public function getResponseEmailSent(): bool
    {
        return $this->responseEmailSent;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getLastReplyTime(): int
    {
        return $this->lastReplyTime;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getLastMessageBy(): ?int
    {
        return $this->lastMessageBy;
    }

    public function getStatusId(): int
    {
        return $this->statusId;
    }

    public function getLocked(): int
    {
        return $this->locked;
    }

    public function getMessagesCount(): ?int
    {
        return $this->messagesCount;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getPausedTime(): ?int
    {
        return $this->pausedTime;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getInternal(): int
    {
        return $this->internal;
    }

    public function getPriorityId(): int
    {
        return $this->priorityId;
    }

    public function getDeletedAt(): ?int
    {
        return $this->deletedAt;
    }

    public function getSlaPlanId(): ?int
    {
        return $this->slaPlanId;
    }

    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    public function getLastReplyBy(): ?int
    {
        return $this->lastReplyBy;
    }

    public function getReopenedTime(): ?int
    {
        return $this->reopenedTime;
    }

    public function getLastMessageId(): ?int
    {
        return $this->lastMessageId;
    }

    public function getNotesCount(): ?int
    {
        return $this->notesCount;
    }

    public function getLastMessageTime(): int
    {
        return $this->lastMessageTime;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function getHasDraft(): bool
    {
        return $this->hasDraft;
    }

    public function getResolvedTime(): ?int
    {
        return $this->resolvedTime;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return array<mixed>
     */
    public function getCc(): array
    {
        return $this->cc;
    }

    public function getMerged(): int
    {
        return $this->merged;
    }

    public function getDueTime(): ?int
    {
        return $this->dueTime;
    }

    public function getTimeWhilePaused(): int
    {
        return $this->timeWhilePaused;
    }

    public function getHasAttachments(): ?int
    {
        return $this->hasAttachments;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getChannelId(): int
    {
        return $this->channelId;
    }

    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    /**
     * @return Tag[]|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return Operator[]|null
     */
    public function getWatching(): ?array
    {
        return $this->watching;
    }

    /**
     * @return Operator[]|null
     */
    public function getAssigned(): ?array
    {
        return $this->assigned;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function getLastReply(): ?Message
    {
        return $this->lastReply;
    }

    public function getSlaplan(): ?SlaPlan
    {
        return $this->slaplan;
    }

    /**
     * @return TicketCustomField[]|null
     */
    public function getCustomfields(): ?array
    {
        return $this->customfields;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function getPriority(): ?Priority
    {
        return $this->priority;
    }

    public function getFrontendUrl(): ?string
    {
        return $this->frontendUrl;
    }

    public function getOperatorUrl(): ?string
    {
        return $this->operatorUrl;
    }
}
