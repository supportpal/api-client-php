<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Tag extends BaseModel
{
    public function __construct(
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('colour')]
        public readonly string $colour,

        #[SerializedName('colour_text')]
        public readonly string $colourText,

        #[SerializedName('original_name')]
        public readonly string $originalName,

        /** @var TagTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations = null,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
