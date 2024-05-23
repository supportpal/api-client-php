<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Group extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        #[SerializedName('description')]
        public readonly string|null $description,

        #[SerializedName('administrator')]
        public readonly int $administrator,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('colour')]
        public readonly string $colour,

        /** @var GroupTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
