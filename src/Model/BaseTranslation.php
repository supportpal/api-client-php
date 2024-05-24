<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Attribute\SerializedName;

abstract class BaseTranslation extends BaseModel
{
    public function __construct(
        #[SerializedName('locale')]
        public readonly string $locale,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
