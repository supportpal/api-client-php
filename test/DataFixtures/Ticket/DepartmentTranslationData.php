<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Department\DepartmentTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class DepartmentTranslationData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'department_id' => 2,
        'name' => 'test',
        'description' => null,
        'locale' => 'ar'
    ];

    public function getModel(): string
    {
        return DepartmentTranslation::class;
    }
}
