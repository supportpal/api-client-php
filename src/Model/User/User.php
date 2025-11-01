<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property int $brand_id
 * @property int $role
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property string $session
 * @property string $remember_token
 * @property int $email_verified
 * @property int $active
 * @property int $organisation_id
 * @property int $organisation_access_level
 * @property int $organisation_notifications
 * @property string $country
 * @property string $language_code
 * @property string $timezone
 * @property string $avatar
 * @property int|null $template_mode
 * @property string|null $notes
 * @property int $twofa_enabled
 * @property string|null $twofa_secret
 * @property string|null $twofa_token
 * @property string|null $twitter_id
 * @property string|null $twitter_handle
 * @property string|null $facebook_id
 * @property int $last_active_at
 * @property int $created_at
 * @property int $updated_at
 * @property string $avatar_url
 * @property string $formatted_name
 * @property array $phone
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
