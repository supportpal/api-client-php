<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CategoryTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('category_id')]
        public readonly int $categoryId,

        #[SerializedName('slug')]
        public readonly string $slug,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
