<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\Model;

class Option extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'           => 'int',
        'field_id'     => 'int',
        'order'        => 'int',
        'value'        => 'string',
        'created_at'   => 'int',
        'updated_at'   => 'int',
        'translations' => 'array:' . OptionTranslation::class,
    ];
}
