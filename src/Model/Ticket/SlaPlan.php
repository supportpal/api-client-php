<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

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
