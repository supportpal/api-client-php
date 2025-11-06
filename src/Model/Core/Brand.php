<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $enabled
 * @property string $system_url
 * @property int|null $enable_ssl
 * @property string|null $brand_colour
 * @property string|null $frontend_logo
 * @property string|null $frontend_logo_dark_mode
 * @property string|null $website_url
 * @property string|null $favicon
 * @property string|null $favicon_dark_mode
 * @property string $frontend_template
 * @property string|null $operator_icon
 * @property string|null $operator_template
 * @property string $default_email
 * @property string $global_email_header
 * @property string $global_email_footer
 * @property string $email_method
 * @property string|null $smtp_host
 * @property int|null $smtp_port
 * @property string|null $smtp_encryption
 * @property int|null $smtp_requires_auth
 * @property string|null $smtp_auth_mech
 * @property string|null $smtp_username
 * @property string|null $smtp_password
 * @property string|null $smtp_oauth
 * @property string $default_country
 * @property string $default_timezone
 * @property string $date_format
 * @property string $time_format
 * @property string $default_language
 * @property int $language_toggle
 * @property int $created_at
 * @property int $updated_at
 * @property BrandTranslation[] $translations
 */
class Brand extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'                      => 'int',
        'name'                    => 'string',
        'enabled'                 => 'int',
        'system_url'              => 'string',
        'enable_ssl'              => 'int',
        'brand_colour'            => 'string',
        'frontend_logo'           => 'string',
        'frontend_logo_dark_mode' => 'string',
        'website_url'             => 'string',
        'favicon'                 => 'string',
        'favicon_dark_mode'       => 'string',
        'frontend_template'       => 'string',
        'operator_icon'           => 'string',
        'operator_template'       => 'string',
        'default_email'           => 'string',
        'global_email_header'     => 'string',
        'global_email_footer'     => 'string',
        'email_method'            => 'string',
        'smtp_host'               => 'string',
        'smtp_port'               => 'int',
        'smtp_encryption'         => 'string',
        'smtp_requires_auth'      => 'int',
        'smtp_auth_mech'          => 'string',
        'smtp_username'           => 'string',
        'smtp_password'           => 'string',
        'smtp_oauth'              => 'string',
        'default_country'         => 'string',
        'default_timezone'        => 'string',
        'date_format'             => 'string',
        'time_format'             => 'string',
        'default_language'        => 'string',
        'language_toggle'         => 'int',
        'created_at'              => 'int',
        'updated_at'              => 'int',
        'translations'            => 'array:' . BrandTranslation::class,
    ];
}
