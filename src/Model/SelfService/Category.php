<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Category extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('type_id')]
        public readonly int $typeId,

        #[SerializedName('parent_id')]
        public readonly int|null $parentId,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('slug')]
        public readonly string $slug,

        #[SerializedName('public')]
        public readonly bool $public,

        #[SerializedName('parent_public')]
        public readonly bool $parentPublic,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        #[SerializedName('frontend_url')]
        public readonly string $frontendUrl,

        #[SerializedName('type')]
        public readonly Type $type,

        /** @var CategoryTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,

        #[SerializedName('pinned')]
        public readonly int|null $pinned = null,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
