<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\Tag;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class TagData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'tags',
        'colour' => '#dddddd',
        'created_at' => 0,
        'updated_at' => 0,
        'colour_text' => '#2d3748',
        'original_name' => 'tags'
    ];

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Tag::class;
    }
}
