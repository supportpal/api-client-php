<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class DepartmentTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('description')]
        public readonly ?string $description,

        #[SerializedName('department_id')]
        public readonly int $departmentId,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
