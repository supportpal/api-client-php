<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $colour
 * @property int|null $order
 * @property int $created_at
 * @property int $updated_at
 * @property string $icon
 * @property string $icon_without_tooltip
 * @property Department[] $departments
 * @property PriorityTranslation[] $translations
 */
class Priority extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'         => 'int',
        'name'       => 'string',
        'colour'     => 'string',
        'order'      => 'int',
        'created_at' => 'int',
        'updated_at' => 'int',
        'icon'       => 'string',
        'icon_without_tooltip' => 'string',
        'departments' => 'array:' . Department::class,
        'translations' => 'array:' . PriorityTranslation::class,
    ];
}
