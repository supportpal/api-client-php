<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core;

use SupportPal\ApiClient\Model\Shared\Settings;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class CoreSettingsData extends BaseModelData
{
    public const DATA = [
        'admin_folder' => 'admin',
        'date_format' => 'd/m/Y',
        'default_country' => 'AF',
        'default_frontend_language' => 'en',
        'default_operator_language' => 'en',
        'default_timezone' => 'Europe/London',
        'enable_ssl' => '0',
        'frontend_language' => '1',
        'is_installed' => '1',
        'language_frontend_toggle' => '1',
        'language_operator_toggle' => '1',
        'maintenance_mode' => '0',
        'operator_language' => '1',
        'operator_template' => 'default',
        'simpleauth_key' => 'QkW6FbF5MXwEgbpoFlw2qSIZ1Mr3Q8of',
        'time_format' => 'g =>i A',
        'simpleauth_operators' => '1',
        'debug_mode' => '1',
        'pretty_urls' => '1',
        'default_brand' => '1',
        'attachment_size' => '10M',
        'captcha_type' => '1',
        'upgrade_time' => '1597245403',
        'last_email_log_id' => '',
        'installed_version' => '3.2.0',
        'install_time' => '1597245408',
        'include_operator_name' => '0',
        'include_department_name' => '0',
        'email_method' => 'mail',
        'smtp_host' => '',
        'smtp_port' => '',
        'smtp_encryption' => '',
        'smtp_requires_auth' => '',
        'smtp_username' => '',
        'smtp_password' => '',
        'include_locale_in_uri' => '1',
        'recaptcha_site_key' => '',
        'recaptcha_secret_key' => ''
    ];

    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Settings::class;
    }
}
