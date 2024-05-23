<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Option extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('order')]
        public readonly int|null $order,

        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        #[SerializedName('field_id')]
        public readonly int $fieldId,

        #[SerializedName('value')]
        public readonly string $value,

        /** @var OptionTranslation[]|null */
        #[SerializedName('translations')]
        public readonly ?array $translations,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
