<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TagTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('tag_id')]
        public readonly int $tagId,
        public readonly string $locale,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
