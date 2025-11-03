<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property int|null $brand_id
 * @property int $role
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $email
 * @property string|null $password
 * @property string|null $session
 * @property string|null $remember_token
 * @property int $email_verified
 * @property int $active
 * @property int|null $organisation_id
 * @property int|null $organisation_access_level
 * @property int|null $organisation_notifications
 * @property string|null $country
 * @property string|null $language_code
 * @property string|null $timezone
 * @property string|null $avatar
 * @property int|null $template_mode
 * @property string|null $notes
 * @property int $twofa_enabled
 * @property string|null $twofa_secret
 * @property string|null $twofa_token
 * @property string|null $twitter_id
 * @property string|null $twitter_handle
 * @property string|null $facebook_id
 * @property int|null $last_active_at
 * @property int $created_at
 * @property int $updated_at
 * @property string $avatar_url
 * @property string $formatted_name
 * @property string[] $phone
 * @property Group[] $groups
 * @property UserCustomField[] $customfields
 * @property Organisation $organisation
 */
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
        'phone'                      => 'array',
        'groups'                     => 'array:' . Group::class,
        'customfields'               => 'array:' . UserCustomField::class,
        'organisation'               => Organisation::class,
    ];
}
