<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Model;

class User extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'                         => 'int',
        'brand_id'                   => 'int',
        'role'                       => 'int',
        'firstname'                  => 'string',
        'lastname'                   => 'string',
        'email'                      => 'string',
        'password'                   => 'string',
        'session'                    => 'string',
        'remember_token'             => 'string',
        'email_verified'             => 'int',
        'active'                     => 'int',
        'organisation_id'            => 'int',
        'organisation_access_level'  => 'int',
        'organisation_notifications' => 'int',
        'country'                    => 'string',
        'language_code'              => 'string',
        'timezone'                   => 'string',
        'avatar'                     => 'string',
        'template_mode'              => 'int',
        'notes'                      => 'string',
        'twofa_enabled'              => 'int',
        'twofa_secret'               => 'string',
        'twofa_token'                => 'string',
        'twitter_id'                 => 'string',
        'twitter_handle'             => 'string',
        'facebook_id'                => 'string',
        'last_active_at'             => 'int',
        'created_at'                 => 'int',
        'updated_at'                 => 'int',
        'avatar_url'                 => 'string',
        'formatted_name'             => 'string',
        'groups'                     => 'array:' . Group::class,
        'customfields'               => 'array:' . UserCustomField::class,
        'organisation'               => Organisation::class,
    ];
}
