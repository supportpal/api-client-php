<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $status_id
 * @property string $name
 */
class StatusTranslation extends Translation
{
    /** @var array<string,string> */
    protected $casts = [
        'id'        => 'int',
        'status_id' => 'int',
        'name'      => 'string',
    ];
}
