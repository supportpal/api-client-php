<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\Model;

class Brand extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
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
