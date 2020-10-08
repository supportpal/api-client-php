<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

class CustomFieldData
{
    public const CUSTOM_FIELD_DATA = [
        'id' => 1,
        'name' => 'Related Product/Service',
        'description' => 'Please select an option if this ticket is related to one of your products/services.',
        'type' => 5,
        'depends_on_field_id' => null,
        'depends_on_option_id' => null,
        'order' => 0,
        'required' => 0,
        'public' => 1,
        'encrypted' => 0,
        'purge' => 0,
        'locked' => 0,
        'regex' => null,
        'regex_error_message' => null,
        'created_at' => 1598621911,
        'updated_at' => 1598621911,
        'options' => [],
        'brands' => [
            [
                'id' => 1,
                'name' => 'gaith',
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
                'default_email' => 'test@test.com',
                'global_email_header' => "\n<!--[if !mso]><!-- -->\n<link href=\"https =>//fonts.googleapis.com/css?family=Open+Sans =>400,700\" rel=\"stylesheet\" type=\"text/css\" />\n<!--<![endif]-->\n<style type=\"text/css\">\ntd [ font => 13px \"Open Sans\", Arial, sans-serif; ]\n</style>\n<table style=\"border-collapse => collapse; max-width => 1000px;\">\n<tr>\n<td>\n",
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
                'updated_at' => 1597245396,
                'pivot' => [
                    'field_id' => 1,
                    'brand_id' => 1
                ]
            ]
        ],
        'departments' => [
            [
                'id' => 1,
                'name' => 'Support',
                'description' => 'This is an automatically generated department, please edit me.',
                'order' => 1,
                'parent_id' => null,
                'public' => 1,
                'ticket_number_format' => null,
                'from_name' => null,
                'default_assignedto' => [],
                'notify_frontend_ticket' => 1,
                'notify_email_ticket' => 1,
                'notify_operators' => 1,
                'disable_user_email_replies' => 0,
                'registered_only' => 0,
                'email_templates' => [
                    'user_ticket_opened' => 3,
                    'user_user_ticket_reply' => 29,
                    'user_ticket_reply' => 2,
                    'user_ticket_locked' => 8,
                    'user_ticket_waitingresponse' => 11,
                    'user_ticket_autoclose' => 13,
                    'user_ticket_operatorclose' => 20,
                    'user_email_attachmentrejected' => 21,
                    'user_ticket_disablereplies' => -1,
                    'user_ticket_registeredonly' => 28,
                    'operator_assigned' => 1,
                    'operator_ticket_opened' => 4,
                    'operator_user_ticket_reply' => 5,
                    'operator_internal_opened' => 18,
                    'operator_department_changed' => 19,
                    'operator_operator_ticket_reply' => 23,
                    'operator_ticket_note' => 24
                ],
                'created_at' => 1597245387,
                'updated_at' => 1597245387,
                'pivot' => [
                    'field_id' => 1,
                    'department_id' => 1
                ]
            ],
            [
                'id' => 2,
                'name' => 'Department2',
                'description' => '',
                'order' => 2,
                'parent_id' => null,
                'public' => 1,
                'ticket_number_format' => null,
                'from_name' => null,
                'default_assignedto' => [],
                'notify_frontend_ticket' => 1,
                'notify_email_ticket' => 1,
                'notify_operators' => 0,
                'disable_user_email_replies' => 0,
                'registered_only' => 0,
                'email_templates' => [
                    'user_ticket_opened' => 3,
                    'user_user_ticket_reply' => 29,
                    'user_ticket_reply' => 2,
                    'user_ticket_locked' => 8,
                    'user_ticket_waitingresponse' => 11,
                    'user_ticket_autoclose' => 13,
                    'user_ticket_operatorclose' => 20,
                    'user_email_attachmentrejected' => 21,
                    'user_ticket_disablereplies' => -1,
                    'user_ticket_registeredonly' => 28,
                    'operator_assigned' => 1,
                    'operator_ticket_opened' => 4,
                    'operator_user_ticket_reply' => 5,
                    'operator_internal_opened' => 18,
                    'operator_department_changed' => 19,
                    'operator_operator_ticket_reply' => 23,
                    'operator_ticket_note' => 24
                ],
                'created_at' => 1598452141,
                'updated_at' => 1598452141,
                'pivot' => [
                    'field_id' => 1,
                    'department_id' => 2
                ]
            ]
        ]
    ];

    public const GET_CUSTOMFIELDS_SUCCESSFUL_RESPONSE_DATA = [
        'status' => 'success',
        'message' => null,
        'count' => 1,
        'data' => [self::CUSTOM_FIELD_DATA],
    ];
}
