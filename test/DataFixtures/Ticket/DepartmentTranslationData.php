<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Department\DepartmentTranslation;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class DepartmentTranslationData extends BaseModelData
{
    public const DATA = [
        'department_id' => 2,
        'name' => 'test',
        'description' => null,
        'locale' => 'ar'
    ];

    public static function getModel(): string
    {
        return DepartmentTranslation::class;
    }
}
