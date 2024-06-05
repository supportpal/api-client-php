<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\User;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class SettingsData extends BaseModelData
{
    public const DATA = [
        'ldap_enabled'               => '1',
        'operator_password_length'   => '4',
        'registration_captcha'       => '1',
        'registration_enabled'       => '1',
        'user_name_format'           => '0',
        'user_password_length'       => '4',
        'ban_after_count_user'       => '3',
        'ban_length_user'            => '900',
        'ban_after_count_operator'   => '3',
        'ban_length_operator'        => '900',
        'organisations_enabled'      => '1',
        'organisation_notifications' => '1',
        'operator_name_format'       => '0',
        'use_gravatar'               => '0',
        'force_2fa_users'            => '0',
        'force_2fa_operators'        => '0',
        'user_password_strength'     => '{"letters":"1","digits":"0","case":"0","symbols":"0"}',
        'operator_password_strength' => '{"letters":"0","digits":"0","case":"0","symbols":"0"}',
        'login_captcha'              => '1',
        'user_login_captcha'         => '1',
        'operator_login_captcha'     => '1'
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Settings::class;
    }
}
