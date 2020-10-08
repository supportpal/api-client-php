<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Department\Email;
use SupportPal\ApiClient\Model\Department\EmailTemplates;
use SupportPal\ApiClient\Model\Department\Operator;
use SupportPal\ApiClient\Tests\DataFixtures\Core\UserData;

class DepartmentData
{
    public const DEPARTMENT_DATA = [
        'id' => 1,
        'name' => 'Support',
        'description' => 'This is an automatically generated department, please edit me.',
        'order' => 1,
        'parent_id' => null,
        'public' => 1,
        'ticket_number_format' => null,
        'from_name' => null,
        'notify_frontend_ticket' => 1,
        'notify_email_ticket' => 1,
        'notify_operators' => 1,
        'disable_user_email_replies' => 0,
        'registered_only' => 0,
        'created_at' => 1597245387,
        'updated_at' => 1597245387,
        'default_assignedto' => [UserData::USER_DATA,],
        'groups' => [],
    ];

    public const GET_DEPARTMENTS_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'count' => 2,
        'data' => [
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
                'emails' => [
                    [
                        'id' => 1,
                        'department_id' => '1',
                        'brand_id' => 1,
                        'address' => 'test@test.com',
                        'type' => 0,
                        'protocol' => null,
                        'server' => null,
                        'username' => null,
                        'password' => null,
                        'port' => null,
                        'encryption' => null,
                        'consume_all' => null,
                        'delete_downloaded' => null,
                        'created_at' => 0,
                        'updated_at' => 0
                    ],
                    [
                        'id' => 2,
                        'department_id' => '1',
                        'brand_id' => 1,
                        'address' => 'test@test.com',
                        'type' => 0,
                        'protocol' => null,
                        'server' => null,
                        'username' => null,
                        'password' => null,
                        'port' => null,
                        'encryption' => null,
                        'consume_all' => null,
                        'delete_downloaded' => null,
                        'created_at' => 0,
                        'updated_at' => 0
                    ],
                    [
                        'id' => 3,
                        'department_id' => '1',
                        'brand_id' => 1,
                        'address' => 'test@test.com',
                        'type' => 0,
                        'protocol' => null,
                        'server' => null,
                        'username' => null,
                        'password' => null,
                        'port' => null,
                        'encryption' => null,
                        'consume_all' => null,
                        'delete_downloaded' => null,
                        'created_at' => 0,
                        'updated_at' => 0
                    ]
                ],
                'groups' => [],
                'operators' => [
                    [
                        'id' => 1,
                        'role' => 1,
                        'firstname' => 'test',
                        'lastname' => 'test',
                        'email' => 'test@test.com',
                        'confirmed' => 1,
                        'active' => 1,
                        'organisation_id' => null,
                        'organisation_access_level' => null,
                        'country' => null,
                        'language_code' => null,
                        'timezone' => null,
                        'avatar' => 'R0lGODlhQABAANUAAAAAAP////7+/v39/fz8/Pv7+/r6+vn5+fj4+Pf39/b29vX19fT09PPz8/Ly8vHx8fDw8O/v7+7u7u3t7ezs7Orq6unp6ejo6Ofn5+bm5uXl5eTk5OPj4+Li4uHh4eDg4N/f393d3dzc3Nvb29ra2tnZ2djY2NfX19bW1tXV1dTU1NPT09LS0tHR0dDQ0M/Pz87Ozs3NzczMzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACwAAAAAQABAAAAG/8CAcEgsGo/IpHLJbDqf0Kh0Sq1ar9isdss1JjKll+ylClkM3WsBFJO5324YCJ2WFlDw/LvVqDsFFHh6gzIwDH5LAyOEjDIqA4hJIY2NFpFHEZSNKZdGJZqNCJ1DBTCgjBKjQg2njBiqARKthBuwE7ODtaqZuHmvqqy9cBWwB23CbhSwAi3IbhGwAYvOCtEYzi+QsAzOJtEBAizIGd8BHMgL5QvHsykC5QInvRflQrezLnTlAyqzuvUB7oFqoa+egBWniAEcIkhTuoVCGlKqBpGAOFATIBr4dOoFBIMUms2K8UGUqgEUUjiLIeLBO0QKNoh09mYFhgJdAJlgRzMPDIoPB7RIQNiTEowOBKwM+FC0VYuMUwZwbNrqVxSmVHFBgxIs66wWSZ+Q8NpLwxMEPMkO1MbEgtpeH5uIeIvrQ5NwdGepaGIg78iCSB74neWg7eBWCpV0OHyqA5O5jDWJYCIvMqUTTIhaZrSCiZjNjFwwSQsaDgwmpRnFQJ160AvWrfN0XhJbDwkjQQAAOw==',
                        'created_at' => 1597245408,
                        'updated_at' => 1597245408,
                        'formatted_name' => 'test test',
                        'avatar_url' => 'http =>//localhost =>8080/resources/assets/frontend/img/user.gif?v=3.2.0',
                        'pivot' => [
                            'department_id' => 1,
                            'user_id' => 1
                        ]
                    ]
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
                'emails' => [
                    [
                        'id' => 4,
                        'department_id' => '2',
                        'brand_id' => 1,
                        'address' => 'test@test.com',
                        'type' => 0,
                        'protocol' => null,
                        'server' => null,
                        'username' => null,
                        'password' => null,
                        'port' => null,
                        'encryption' => null,
                        'consume_all' => null,
                        'delete_downloaded' => null,
                        'created_at' => 1598452141,
                        'updated_at' => 1598452141
                    ]
                ],
                'groups' => [],
                'operators' => []
            ]
        ]
    ];

    const GET_DEPARTMENT_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'count' => 2,
        'data' => self::DEPARTMENT_DATA
    ];

    /**
     * @return array<mixed>
     * @throws InvalidArgumentException
     */
    public static function getDepartmentData(): array
    {
        $departmentData = self::DEPARTMENT_DATA;

        $departmentData['email_templates'] = (new EmailTemplates)->fill(EmailTemplatesData::EMAIL_TEMPLATES_DATA);
        $departmentData['emails'] = [(new Email)->fill(EmailData::EMAIL_DATA)];
        $departmentData['operators'] = [(new Operator)->fill(OperatorData::OPERATOR_DATA)];

        return $departmentData;
    }
}
