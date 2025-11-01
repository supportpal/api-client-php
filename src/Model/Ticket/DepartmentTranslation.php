<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Translation;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $department_id
 */
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
