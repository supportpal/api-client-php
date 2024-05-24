<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Article extends BaseModel
{
    public function __construct(
        #[SerializedName('purified_text')]
        public readonly string $purifiedText,
        #[SerializedName('pinned')]
        public readonly bool $pinned,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('text')]
        public readonly string $text,
        #[SerializedName('public')]
        public readonly bool $public,
        #[SerializedName('title')]
        public readonly string $title,
        #[SerializedName('author_id')]
        public readonly int|null $authorId,
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('excerpt')]
        public readonly string|null $excerpt,
        #[SerializedName('plain_text')]
        public readonly string $plainText,
        #[SerializedName('published_at')]
        public readonly int|null $publishedAt,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('keywords')]
        public readonly string|null $keywords,
        #[SerializedName('slug')]
        public readonly string $slug,
        #[SerializedName('published')]
        public readonly bool $published,
        /** @var Category[]|null */
        #[SerializedName('categories')]
        public readonly array|null $categories,
        /** @var Type[]|null */
        #[SerializedName('types')]
        public readonly array|null $types,
        /** @var ArticleAttachment[]|null */
        #[SerializedName('attachments')]
        public readonly array|null $attachments,
        /** @var Tag[]|null */
        #[SerializedName('tags')]
        public readonly array|null $tags,
        /** @var ArticleTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,
        #[SerializedName('views')]
        public readonly int|null $views = null,
        #[SerializedName('positive_rating')]
        public readonly int|null $positiveRating = null,
        #[SerializedName('total_rating')]
        public readonly int|null $totalRating = null,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
