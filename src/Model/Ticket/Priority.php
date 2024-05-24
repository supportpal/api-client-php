<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Department\Department;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Priority extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('colour')]
        public readonly string $colour,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('order')]
        public readonly int|null $order,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('icon')]
        public readonly string $icon,
        #[SerializedName('icon_without_tooltip')]
        public readonly string $iconWithoutTooltip,
        /** @var Department[]|null */
        public readonly ?array $departments,
        /** @var PriorityTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
