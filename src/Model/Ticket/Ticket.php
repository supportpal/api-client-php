<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Department\Operator;
use SupportPal\ApiClient\Model\User\User;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Ticket extends BaseModel
{
    public function __construct(
        #[SerializedName('department_email_id')]
        public readonly int|null $departmentEmailId,
        #[SerializedName('last_reply_id')]
        public readonly int|null $lastReplyId,
        #[SerializedName('response_email_sent')]
        public readonly bool $responseEmailSent,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('last_reply_time')]
        public readonly int $lastReplyTime,
        /** @var string */
        #[SerializedName('subject')]
        public readonly string $subject,
        #[SerializedName('last_message_by')]
        public readonly int|null $lastMessageBy,
        #[SerializedName('status_id')]
        public readonly int $statusId,
        #[SerializedName('locked')]
        public readonly int $locked,
        #[SerializedName('messages_count')]
        public readonly int|null $messagesCount,
        #[SerializedName('user_id')]
        public readonly int $userId,
        #[SerializedName('paused_time')]
        public readonly int|null $pausedTime,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('internal')]
        public readonly int $internal,
        #[SerializedName('priority_id')]
        public readonly int $priorityId,
        #[SerializedName('deleted_at')]
        public readonly int|null $deletedAt,
        #[SerializedName('sla_plan_id')]
        public readonly int|null $slaPlanId,
        #[SerializedName('department_id')]
        public readonly int $departmentId,
        #[SerializedName('last_reply_by')]
        public readonly int|null $lastReplyBy,
        #[SerializedName('reopened_time')]
        public readonly int|null $reopenedTime,
        #[SerializedName('last_message_id')]
        public readonly int|null $lastMessageId,
        #[SerializedName('notes_count')]
        public readonly int|null $notesCount,
        #[SerializedName('last_message_time')]
        public readonly int $lastMessageTime,
        #[SerializedName('brand_id')]
        public readonly int $brandId,
        #[SerializedName('has_draft')]
        public readonly bool $hasDraft,
        #[SerializedName('resolved_time')]
        public readonly int|null $resolvedTime,
        #[SerializedName('number')]
        public readonly string $number,
        /** @var mixed[] */
        #[SerializedName('cc')]
        public readonly array $cc,
        #[SerializedName('merged')]
        public readonly int $merged,
        #[SerializedName('due_time')]
        public readonly int|null $dueTime,
        #[SerializedName('time_while_paused')]
        public readonly int $timeWhilePaused,
        #[SerializedName('has_attachments')]
        public readonly int|null $hasAttachments,
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('channel_id')]
        public readonly int $channelId,
        #[SerializedName('channel')]
        public readonly Channel|null $channel,
        #[SerializedName('department')]
        public readonly Department|null $department,
        /** @var Tag[]|null */
        #[SerializedName('tags')]
        public readonly array|null $tags,
        #[SerializedName('user')]
        public readonly User|null $user,
        #[SerializedName('token')]
        public readonly string $token,
        /** @var Operator[]|null */
        #[SerializedName('watching')]
        public readonly array|null $watching,
        /** @var Operator[]|null */
        #[SerializedName('assigned')]
        public readonly array|null $assigned,
        #[SerializedName('brand')]
        public readonly Brand|null $brand,
        #[SerializedName('last_reply')]
        public readonly Message|null $lastReply,
        #[SerializedName('slaplan')]
        public readonly SlaPlan|null $slaplan,
        /** @var TicketCustomField[]|null */
        #[SerializedName('customfields')]
        public readonly array|null $customfields,
        #[SerializedName('status')]
        public readonly Status|null $status,
        #[SerializedName('priority')]
        public readonly Priority|null $priority,
        #[SerializedName('frontend_url')]
        public readonly string|null $frontendUrl,
        #[SerializedName('operator_url')]
        public readonly string|null $operatorUrl,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
