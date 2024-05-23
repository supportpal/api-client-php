<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TagTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('tag_id')]
        public readonly int $tagId,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('slug')]
        public readonly string $slug,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
