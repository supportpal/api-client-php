<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property int $sla_plan_id
 * @property string $name
 * @property string $description
 */
class SlaPlanTranslation extends Translation
{
    /** @var array<string,string> */
    protected $casts = [
        'id'          => 'int',
        'sla_plan_id' => 'int',
        'name'        => 'string',
        'description' => 'string',
    ];
}
