<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class OptionTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('value')]
        public readonly string $value,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
