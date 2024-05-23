<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ArticleTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('text')]
        public readonly string $text,

        #[SerializedName('title')]
        public readonly string $title,

        #[SerializedName('plain_text')]
        public readonly string $plainText,

        #[SerializedName('keywords')]
        public readonly string|null $keywords,

        #[SerializedName('excerpt')]
        public readonly string|null $excerpt,

        #[SerializedName('article_id')]
        public readonly int $articleId,

        #[SerializedName('purified_text')]
        public readonly string $purifiedText,

        #[SerializedName('slug')]
        public readonly string $slug,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
