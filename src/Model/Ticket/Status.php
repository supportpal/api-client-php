<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Status extends BaseModel
{
    public function __construct(
        #[SerializedName('colour')]
        public readonly string $colour,
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('order')]
        public readonly int|null $order,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('icon_without_tooltip')]
        public readonly string $iconWithoutTooltip,
        #[SerializedName('icon')]
        public readonly string $icon,
        #[SerializedName('auto_close')]
        public readonly bool $autoClose,
        /** @var StatusTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
