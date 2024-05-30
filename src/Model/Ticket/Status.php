<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

class Status extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected array $casts = [
        'id'         => 'int',
        'name'       => 'string',
        'colour'     => 'string',
        'auto_close' => 'int',
        'order'      => 'int',
        'created_at' => 'int',
        'updated_at' => 'int',
        'icon'       => 'string',
        'icon_without_tooltip' => 'string',
        'translations' => 'array:' . StatusTranslation::class,
    ];
}
