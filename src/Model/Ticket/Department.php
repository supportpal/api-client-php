<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\User\Group;
use SupportPal\ApiClient\Model\User\User;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $order
 * @property int|null $parent_id
 * @property int $public
 * @property string|null $ticket_number_format
 * @property string|null $from_name
 * @property int $notify_frontend_ticket
 * @property int $notify_email_ticket
 * @property int $notify_operators
 * @property int $disable_user_email_replies
 * @property int $registered_only
 * @property int $created_at
 * @property int $updated_at
 * @property DepartmentEmailTemplates[]|null $email_templates
 * @property DepartmentEmail[] $emails
 * @property DepartmentTranslation[] $translations
 * @property Group[] $groups
 * @property User[] $operators
 * @property Department $parent
 * @property User[]|null $default_assignedto
 */
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
        'email_templates'            => 'array:' . DepartmentEmailTemplates::class,
        'emails'                     => 'array:' . DepartmentEmail::class,
        'translations'               => 'array:' . DepartmentTranslation::class,
        'groups'                     => 'array:' . Group::class,
        'operators'                  => 'array:' . User::class,
        'parent'                     => self::class,
        'default_assignedto'         => 'array:' . User::class,
    ];
}
