<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TypeTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('type_id')]
        public readonly int $typeId,
        #[SerializedName('description')]
        public readonly string $description,
        #[SerializedName('slug')]
        public readonly string|null $slug,
        public readonly string $locale,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
