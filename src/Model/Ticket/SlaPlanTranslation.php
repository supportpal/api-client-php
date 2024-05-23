<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class SlaPlanTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('sla_plan_id')]
        public readonly int $slaPlanId,

        #[SerializedName('name')]
        public readonly string|null $name,

        #[SerializedName('description')]
        public readonly string|null $description,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
