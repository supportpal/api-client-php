<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\User\User;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Comment extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('text')]
        public readonly string $text,
        #[SerializedName('article_id')]
        public readonly int $articleId,
        #[SerializedName('type_id')]
        public readonly int $typeId,
        #[SerializedName('parent_id')]
        public readonly int|null $parentId,
        #[SerializedName('author_id')]
        public readonly int|null $authorId,
        #[SerializedName('purified_text')]
        public readonly string|null $purifiedText,
        #[SerializedName('name')]
        public readonly string|null $name,
        #[SerializedName('author')]
        public readonly User|null $author,
        #[SerializedName('article')]
        public readonly Article|null $article,
        #[SerializedName('type')]
        public readonly Type|null $type,
        #[SerializedName('created_at')]
        public readonly int|null $createdAt,
        #[SerializedName('updated_at')]
        public readonly int|null $updatedAt,
        #[SerializedName('root_parent_id')]
        public readonly int|null $rootParentId,
        #[SerializedName('rating')]
        public readonly int|null $rating,
        #[SerializedName('status')]
        public readonly int $status = 0,
        #[SerializedName('notify_reply')]
        public readonly bool $notifyReply = false,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
