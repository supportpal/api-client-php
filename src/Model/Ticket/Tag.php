<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $colour
 * @property int $created_at
 * @property int $updated_at
 * @property string $colour_text
 * @property string $original_name
 * @property TagTranslation[] $translations
 */
class Tag extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'         => 'int',
        'name'       => 'string',
        'colour'     => 'string',
        'created_at' => 'int',
        'updated_at' => 'int',
        'colour_text' => 'string',
        'original_name' => 'string',
        'translations' => 'array:' . TagTranslation::class,
    ];
}
