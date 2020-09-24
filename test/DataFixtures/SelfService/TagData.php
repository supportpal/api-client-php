<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\SelfService;

class TagData
{
    public const TAG_DATA = [
        'id' => 1,
        'name' => 'test',
        'slug' => 'test',
        'created_at' => 1600880073,
        'updated_at' => 1600880073
    ];

    const GET_TAG_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'data' => self::TAG_DATA,
    ];
}
