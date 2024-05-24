<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class BrandTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('brand_id')]
        public readonly int $brandId,
        public readonly string $locale,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
