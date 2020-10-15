<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Core;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class BrandData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'test',
        'enabled' => 1,
        'system_url' => 'localhost',
        'brand_colour' => null,
        'enable_ssl' => null,
        'frontend_logo' => null,
        'frontend_logo_dark_mode' => null,
        'website_url' => null,
        'favicon' => null,
        'frontend_template' => 'default',
        'frontend_template_mode' => 0,
        'operator_icon' => null,
        'operator_template' => null,
        'operator_template_mode' => 0,
        'default_email' => 'test@example.com',
        'global_email_header' => 'testheader',
        'global_email_footer' => 'testfooter',
        'email_method' => 'default',
        'smtp_host' => null,
        'smtp_port' => null,
        'smtp_encryption' => null,
        'smtp_requires_auth' => null,
        'smtp_username' => null,
        'smtp_password' => null,
        'default_country' => 'default',
        'default_timezone' => 'default',
        'date_format' => 'default',
        'time_format' => 'default',
        'default_language' => 'default',
        'language_toggle' => 2,
        'created_at' => 1597245387,
        'updated_at' => 1597245396,
        'translations' => [BrandTranslationData::DATA]
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;

        $data['translations'] = [BrandTranslationData::getFilledInstance()];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Brand::class;
    }
}
