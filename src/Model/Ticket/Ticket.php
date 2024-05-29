<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Department\Operator;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\User;

class Ticket extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string,string>
     */
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
