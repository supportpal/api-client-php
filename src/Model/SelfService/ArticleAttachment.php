<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Upload;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ArticleAttachment extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('upload_hash')]
        public readonly string $uploadHash,
        #[SerializedName('article_id')]
        public readonly int $articleId,
        #[SerializedName('locale')]
        public readonly ?string $locale,
        #[SerializedName('original_name')]
        public readonly string $originalName,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('upload')]
        public readonly Upload $upload,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
