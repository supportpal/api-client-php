<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class SlaPlan extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('condition_group_type')]
        public readonly int $conditionGroupType,

        #[SerializedName('description')]
        public readonly string|null $description,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('order')]
        public readonly int|null $order,

        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        #[SerializedName('all_hours')]
        public readonly int $allHours,

        #[SerializedName('name')]
        public readonly string $name,

        /** @var SlaPlanTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
