<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $order
 * @property int $all_hours
 * @property int $condition_group_type
 * @property int $created_at
 * @property int $updated_at
 * @property SlaPlanTranslation[] $translations
 */
class SlaPlan extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'                   => 'int',
        'name'                 => 'string',
        'description'          => 'string',
        'order'                => 'int',
        'all_hours'            => 'int',
        'condition_group_type' => 'int',
        'created_at'           => 'int',
        'updated_at'           => 'int',
        'translations'         => 'array:' . SlaPlanTranslation::class,
    ];
}
