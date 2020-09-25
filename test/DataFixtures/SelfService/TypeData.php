<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

use SupportPal\ApiClient\Model\Core\Brand;

class TypeData
{
    public const ARTICLE_TYPE_DATA = [
        'id' => 1,
        'brand_id' => 1,
        'name' => 'Announcements',
        'slug' => 'announcements',
        'description' => 'View the latest news and announcements.',
        'order' => 1,
        'enabled' => 1,
        'protected' => 0,
        'internal' => 0,
        'content' => 0,
        'view' => 1,
        'icon' => 'fa-newspaper',
        'article_ordering' => 2,
        'show_on_dashboard' => 1,
        'external_link' => null,
        'created_at' => 1597245387,
        'updated_at' => 1597245387,
    ];

    const GET_TYPES_SUCCESSFUL_RESPONSE = [
            'status' => 'success',
            'message' => null,
            'count' => 2,
            'data' => [
                [
                    'id' => 1,
                    'brand_id' => 1,
                    'name' => 'Announcements',
                    'slug' => 'announcements',
                    'description' => 'View the latest news and announcements.',
                    'order' => 1,
                    'enabled' => 1,
                    'protected' => 0,
                    'internal' => 0,
                    'content' => 0,
                    'view' => 1,
                    'icon' => 'fa-newspaper',
                    'article_ordering' => 2,
                    'show_on_dashboard' => 1,
                    'external_link' => null,
                    'created_at' => 1597245387,
                    'updated_at' => 1597245387,
                    'brand' => [
                        'id' => 1,
                        'name' => 'testuser',
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
                        'default_email' => 'usertest@test.com',
                        'global_email_header' => "\n<!--[if !mso]><\!-- -->\n<link href=\"https://fonts.googleapis.com/css?family=Open+Sans:400,700\" rel=\"stylesheet\" type=\"text/css\" />\n<!--<![endif]-->\n<style type=\"text/css\">\ntd { font: 13px \"Open Sans\", Arial, sans-serif; }\n</style>\n<table style=\"border-collapse: collapse; max-width: 1000px;\">\n<tr>\n<td>\n",
                        'global_email_footer' => "\n</td>\n</tr>\n</table>\n",
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
                        'updated_at' => 1597245396
                    ]
                ],
                [
                    'id' => 2,
                    'brand_id' => 1,
                    'name' => 'Knowledgebase',
                    'slug' => 'knowledgebase',
                    'description' => 'Browse the knowledgebase to find answers to commonly asked questions.',
                    'order' => 2,
                    'enabled' => 1,
                    'protected' => 0,
                    'internal' => 0,
                    'content' => 0,
                    'view' => 0,
                    'icon' => 'fa-book',
                    'article_ordering' => 1,
                    'show_on_dashboard' => 1,
                    'external_link' => null,
                    'created_at' => 1597245387,
                    'updated_at' => 1597245387,
                    'brand' => [
                        'id' => 1,
                        'name' => 'testuser',
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
                        'default_email' => 'usertest@test.com',
                        'global_email_header' => "\n<!--[if !mso]><\!-- -->\n<link href=\"https://fonts.googleapis.com/css?family=Open+Sans:400,700\" rel=\"stylesheet\" type=\"text/css\" />\n<!--<![endif]-->\n<style type=\"text/css\">\ntd [ font => 13px \"Open Sans\", Arial, sans-serif; ]\n</style>\n<table style=\"border-collapse => collapse; max-width => 1000px;\">\n<tr>\n<td>\n",
                        'global_email_footer' => "\n</td>\n</tr>\n</table>\n",
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
                        'updated_at' => 1597245396
                    ]
                ]
            ]
    ];

    /**
     * @return array<mixed>
     */
    public static function getTypeData(): array
    {
        $data = self::ARTICLE_TYPE_DATA;
        $data['brand'] = new Brand;

        return $data;
    }
}
