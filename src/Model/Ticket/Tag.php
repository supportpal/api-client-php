<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

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
