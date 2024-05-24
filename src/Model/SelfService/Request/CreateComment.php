<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateComment extends BaseModel
{
    public function __construct(
        #[SerializedName('article_id')]
        public readonly int $articleId,
        #[SerializedName('type_id')]
        public readonly int $typeId,
        #[SerializedName('parent_id')]
        public readonly ?int $parentId,
        #[SerializedName('author_id')]
        public readonly ?int $authorId,
        #[SerializedName('name')]
        public readonly ?string $name,
        #[SerializedName('text')]
        public readonly string $text,
        #[SerializedName('status')]
        public readonly ?int $status,
        #[SerializedName('notify_reply')]
        public readonly ?bool $notifyReply,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
