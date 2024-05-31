<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use SupportPal\ApiClient\Model\Model;

class UpdateUser extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'firstname'                    => 'string',
        'lastname'                     => 'string',
        'email'                        => 'string',
        'additional_email'             => 'array',
        'password'                     => 'string',
        'send_email'                   => 'bool',
        'phone'                        => 'array',
        'country'                      => 'string',
        'language_code'                => 'string',
        'timezone'                     => 'string',
        'email_verified'               => 'bool',
        'active'                       => 'int',
        'organisation'                 => 'string',
        'organisation_id'              => 'int',
        'organisation_access_level'    => 'int',
        'organisation_notifications'   => 'int',
        'customfield'                  => 'array',
        'overwrite_customfield_values' => 'bool',
        'groups'                       => 'array',
    ];
}
