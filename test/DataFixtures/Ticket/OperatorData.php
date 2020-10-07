<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

class OperatorData
{
    public const OPERATOR_DATA = [
        'id' => 1,
        'role' => 1,
        'firstname' => 'test',
        'lastname' => 'test',
        'email' => 'test@example.com',
        'confirmed' => 1,
        'active' => 1,
        'organisation_id' => null,
        'organisation_access_level' => null,
        'country' => null,
        'language_code' => null,
        'timezone' => null,
        'avatar' => 'R0lGODlhQABAANUAAAAAAP////7+/v39/fz8/Pv9ra2tnZ20dDQ0M/++egBWniAEcIkhTuoVCGlKqBpGAOFATIBr4dOoFBIMUms2K8UGUqgEUUjiLIeLBO0QKNoh09mYFhgJdAJlgRzMPDIoPB7RIQNiTEowOBKwM+FC0VYuMUwZwbNrqVxSmVHFBgxIs66wWSZ+Q8NpLwxMEPMkO1MbEgtpeH5uIeIvrQ5NwdGepaGIg78iCSB74neWg7eBWCpV0OHyqA5O5jDWJYCIvMqUTTIhaZrSCiZjNjFwwSQsaDgwmpRnFQJ160AvWrfN0XhJbDwkjQQAAOw==',
        'created_at' => 1597245408,
        'updated_at' => 1597245408,
        'formatted_name' => 'test test',
        'avatar_url' => 'http =>//localhost =>8080/resources/assets/frontend/img/user.gif?v=3.2.0',
        'pivot' => [
            'department_id' => 1,
            'user_id' => 1
        ]
    ];
}
