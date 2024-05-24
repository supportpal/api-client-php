<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Tag extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('slug')]
        public readonly string $slug,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        /** @var TagTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,
        public readonly ?array $pivot = null
    ) {
        parent::__construct($pivot);
    }
}
