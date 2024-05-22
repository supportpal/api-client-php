<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\Group;

class Department extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'                         => 'int',
        'name'                       => 'string',
        'description'                => 'string',
        'order'                      => 'int',
        'parent_id'                  => 'int',
        'public'                     => 'int',
        'ticket_number_format'       => 'string',
        'from_name'                  => 'string',
        'notify_frontend_ticket'     => 'int',
        'notify_email_ticket'        => 'int',
        'notify_operators'           => 'int',
        'disable_user_email_replies' => 'int',
        'registered_only'            => 'int',
        'created_at'                 => 'int',
        'updated_at'                 => 'int',
        'email_templates'            => 'array:' . EmailTemplates::class,
        'emails'                     => 'array:' . Email::class,
        'translations'               => 'array:' . DepartmentTranslation::class,
        'groups'                     => 'array:' . Group::class,
        'operators'                  => 'array:' . Operator::class,
        'parent'                     => 'array:' . self::class,
        'default_assignedto'         => 'array:' . Operator::class,
    ];
}
