<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class PriorityTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('priority_id')]
        public readonly int $priorityId,
        public readonly string $locale,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
