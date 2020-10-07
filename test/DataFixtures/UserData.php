<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures;

class UserData
{
    const USER_DATA = [
        'id' => 23,
        'brand_id' => 1,
        'role' => 0,
        'firstname' => 'name1',
        'lastname' => '',
        'email' => null,
        'confirmed' => 0,
        'active' => 1,
        'organisation_id' => null,
        'organisation_access_level' => null,
        'organisation_notifications' => null,
        'country' => null,
        'language_code' => 'en',
        'timezone' => null,
        'avatar' => 'R0lGODlhQABAANUAAAAAAP////7+/v39/fz8/Pv7+/r6+vn5+fj4+Pf39/b29vX19fT09PPz8/Ly8vHx8fDw8O/v7+7u7u3t7ezs7Orq6unp6ejo6Ofn5+bm5uXl5eTk5OPj4+Li4uHh4eDg4N/f393d3dzc3Nvb29ra2tnZ2djY2NfX19bW1tXV1dTU1NPT09LS0tHR0dDQ0M/Pz87Ozs3NzczMzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACwAAAAAQABAAAAG/8CAcEgsGo/IpHLJbDqf0Kh0Sq1ar9isdss1JjKll+ylClkM3WsBFJO5324YCJ2WFlDw/LvVqDsFFHh6gzIwDH5LAyOEjDIqA4hJIY2NFpFHEZSNKZdGJZqNCJ1DBTCgjBKjQg2njBiqARKthBuwE7ODtaqZuHmvqqy9cBWwB23CbhSwAi3IbhGwAYvOCtEYzi+QsAzOJtEBAizIGd8BHMgL5QvHsykC5QInvRflQrezLnTlAyqzuvUB7oFqoa+egBWniAEcIkhTuoVCGlKqBpGAOFATIBr4dOoFBIMUms2K8UGUqgEUUjiLIeLBO0QKNoh09mYFhgJdAJlgRzMPDIoPB7RIQNiTEowOBKwM+FC0VYuMUwZwbNrqVxSmVHFBgxIs66wWSZ+Q8NpLwxMEPMkO1MbEgtpeH5uIeIvrQ5NwdGepaGIg78iCSB74neWg7eBWCpV0OHyqA5O5jDWJYCIvMqUTTIhaZrSCiZjNjFwwSQsaDgwmpRnFQJ160AvWrfN0XhJbDwkjQQAAOw==',
        'template_mode' => null,
        'notes' => null,
        'twofa_enabled' => 0,
        'twofa_secret' => null,
        'twofa_token' => null,
        'twitter_id' => null,
        'twitter_handle' => null,
        'facebook_id' => null,
        'last_active_at' => null,
        'created_at' => 1599475251,
        'updated_at' => 1599475251,
        'formatted_name' => 'name1',
        'avatar_url' => 'http =>//localhost =>8080/resources/assets/frontend/img/user.gif?v=3.2.0',
    ];

    public const GET_USERS_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'count' => 1,
        'data' => [ self::USER_DATA ]
    ];
}
