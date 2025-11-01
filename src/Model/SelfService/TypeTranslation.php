<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $type_id
 * @property string $name
 * @property string $description
 * @property string $slug
 */
class TypeTranslation extends Translation
{
    /** @var array<string, string> */
    protected $casts = [
        'id'          => 'int',
        'type_id'     => 'int',
        'name'        => 'string',
        'description' => 'string',
        'slug'        => 'string',
    ];
}
