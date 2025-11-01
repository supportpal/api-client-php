<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\User;

/**
 * @property int $id
 * @property string $number
 * @property int $department_id
 * @property int $department_email_id
 * @property int $brand_id
 * @property int $channel_id
 * @property int $user_id
 * @property int $status_id
 * @property int $priority_id
 * @property int|null $sla_plan_id
 * @property string $subject
 * @property int|null $due_time
 * @property int|null $paused_time
 * @property int $time_while_paused
 * @property int|null $resolved_time
 * @property int|null $reopened_time
 * @property array $cc
 * @property int $locked
 * @property int $merged
 * @property int $internal
 * @property int $response_email_sent
 * @property int $messages_count
 * @property int $notes_count
 * @property int $has_attachments
 * @property bool $has_draft
 * @property int $last_reply_time
 * @property int $last_message_time
 * @property int $last_reply_id
 * @property int $last_message_id
 * @property int $last_reply_by
 * @property int $last_message_by
 * @property int|null $deleted_at
 * @property int $created_at
 * @property int $updated_at
 * @property string $frontend_url
 * @property string $operator_url
 * @property Channel $channel
 * @property Department $department
 * @property Tag[] $tags
 * @property User $user
 * @property User[] $watching
 * @property User[] $assigned
 * @property Brand $brand
 * @property Message $last_reply
 * @property SlaPlan|null $slaplan
 * @property TicketCustomField[] $customfields
 * @property Status $status
 * @property Priority $priority
 */
class Ticket extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'                  => 'int',
        'number'              => 'string',
        'department_id'       => 'int',
        'department_email_id' => 'int',
        'brand_id'            => 'int',
        'channel_id'          => 'int',
        'user_id'             => 'int',
        'status_id'           => 'int',
        'priority_id'         => 'int',
        'sla_plan_id'         => 'int',
        'subject'             => 'string',
        'due_time'            => 'int',
        'paused_time'         => 'int',
        'time_while_paused'   => 'int',
        'resolved_time'       => 'int',
        'reopened_time'       => 'int',
        'cc'                  => 'array',
        'locked'              => 'int',
        'merged'              => 'int',
        'internal'            => 'int',
        'response_email_sent' => 'int',
        'messages_count'      => 'int',
        'notes_count'         => 'int',
        'has_attachments'     => 'int',
        'has_draft'           => 'boolean',
        'last_reply_time'     => 'int',
        'last_message_time'   => 'int',
        'last_reply_id'       => 'int',
        'last_message_id'     => 'int',
        'last_reply_by'       => 'int',
        'last_message_by'     => 'int',
        'deleted_at'          => 'int',
        'created_at'          => 'int',
        'updated_at'          => 'int',
        'frontend_url'        => 'string',
        'operator_url'        => 'string',
        'channel'             => Channel::class,
        'department'          => Department::class,
        'tags'                => 'array:' . Tag::class,
        'user'                => User::class,
        'watching'            => 'array:' . User::class,
        'assigned'            => 'array:' . User::class,
        'brand'               => Brand::class,
        'last_reply'          => Message::class,
        'slaplan'             => SlaPlan::class,
        'customfields'        => 'array:' . TicketCustomField::class,
        'status'              => Status::class,
        'priority'            => Priority::class,
    ];
}
