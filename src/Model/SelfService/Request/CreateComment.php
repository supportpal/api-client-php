<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateComment extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'article_id',
        'type_id',
        'text',
    ];

    #[SerializedName('article_id')]
    protected int $articleId;

    #[SerializedName('type_id')]
    protected int $typeId;

    #[SerializedName('parent_id')]
    protected ?int $parentId;

    #[SerializedName('author_id')]
    protected ?int $authorId;

    #[SerializedName('name')]
    protected ?string $name;

    #[SerializedName('text')]
    protected string $text;

    #[SerializedName('status')]
    protected ?int $status;

    #[SerializedName('notify_reply')]
    protected ?bool $notifyReply;

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getNotifyReply(): ?bool
    {
        return $this->notifyReply;
    }
}
