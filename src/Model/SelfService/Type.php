<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Type extends BaseModel
{
    public function __construct(
        #[SerializedName('icon')]
        public readonly string|null $icon,
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('description')]
        public readonly string $description,
        #[SerializedName('brand_id')]
        public readonly int $brandId,
        #[SerializedName('article_ordering')]
        public readonly int|null $articleOrdering,
        #[SerializedName('slug')]
        public readonly string|null $slug,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('internal')]
        public readonly bool $internal,
        #[SerializedName('show_on_dashboard')]
        public readonly int|null $showOnDashboard,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('view')]
        public readonly int|null $view,
        #[SerializedName('public')]
        public readonly bool $public,
        #[SerializedName('order')]
        public readonly int|null $order,
        #[SerializedName('external_link')]
        public readonly string|null $externalLink,
        #[SerializedName('enabled')]
        public readonly bool $enabled,
        #[SerializedName('content')]
        public readonly int $content,
        #[SerializedName('brand')]
        public readonly Brand|null $brand,
        /** @var TypeTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,
        public readonly ?array $pivot = null
    ) {
        parent::__construct($pivot);
    }
}
