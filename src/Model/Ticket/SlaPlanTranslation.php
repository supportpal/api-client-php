<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

class SlaPlanTranslation extends Translation
{
    /** @var array<string,string> */
    protected array $casts = [
        'id'          => 'int',
        'sla_plan_id' => 'int',
        'name'        => 'string',
        'description' => 'string',
    ];
}
