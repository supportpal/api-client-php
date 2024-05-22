<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\User\User;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Comment extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'article_id',
        'type_id',
        'text',
    ];

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('text')]
    protected string $text;

    #[SerializedName('article_id')]
    protected int $articleId;

    #[SerializedName('type_id')]
    protected int $typeId;

    #[SerializedName('parent_id')]
    protected int|null $parentId;

    #[SerializedName('status')]
    protected int $status = 0;

    #[SerializedName('notify_reply')]
    protected bool $notifyReply = false;

    #[SerializedName('author_id')]
    protected int|null $authorId;

    #[SerializedName('purified_text')]
    protected string|null $purifiedText;

    #[SerializedName('name')]
    protected string|null $name;

    #[SerializedName('author')]
    protected User|null $author;

    #[SerializedName('article')]
    protected Article|null $article;

    #[SerializedName('type')]
    protected Type|null $type;

    #[SerializedName('created_at')]
    protected int|null $createdAt;

    #[SerializedName('updated_at')]
    protected int|null $updatedAt;

    #[SerializedName('root_parent_id')]
    protected int|null $rootParentId;

    #[SerializedName('rating')]
    protected int|null $rating;

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

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

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getNotifyReply(): bool
    {
        return $this->notifyReply;
    }

    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    public function getPurifiedText(): ?string
    {
        return $this->purifiedText;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function getRootParentId(): ?int
    {
        return $this->rootParentId;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }
}
