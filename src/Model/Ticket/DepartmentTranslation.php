<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

class DepartmentTranslation extends Translation
{
    /** @var array<string, string> */
    protected $casts = [
        'id'            => 'int',
        'name'          => 'string',
        'description'   => 'string',
        'department_id' => 'int',
    ];
}
