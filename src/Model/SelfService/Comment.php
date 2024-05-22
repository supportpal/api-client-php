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
    private int $id;

    #[SerializedName('text')]
    private string $text;

    #[SerializedName('article_id')]
    private int $articleId;

    #[SerializedName('type_id')]
    private int $typeId;

    #[SerializedName('parent_id')]
    private int|null $parentId;

    #[SerializedName('status')]
    private int $status = 0;

    #[SerializedName('notify_reply')]
    private bool $notifyReply = false;

    #[SerializedName('author_id')]
    private int|null $authorId;

    #[SerializedName('purified_text')]
    private string|null $purifiedText;

    #[SerializedName('name')]
    private string|null $name;

    #[SerializedName('author')]
    private User|null $author;

    #[SerializedName('article')]
    private Article|null $article;

    #[SerializedName('type')]
    private Type|null $type;

    #[SerializedName('created_at')]
    private int|null $createdAt;

    #[SerializedName('updated_at')]
    private int|null $updatedAt;

    #[SerializedName('root_parent_id')]
    private int|null $rootParentId;

    #[SerializedName('rating')]
    private int|null $rating;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;

        return $this;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getNotifyReply(): bool
    {
        return $this->notifyReply;
    }

    public function setNotifyReply(bool $notifyReply): self
    {
        $this->notifyReply = $notifyReply;

        return $this;
    }

    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    public function setAuthorId(?int $authorId): self
    {
        $this->authorId = $authorId;

        return $this;
    }

    public function getPurifiedText(): ?string
    {
        return $this->purifiedText;
    }

    public function setPurifiedText(?string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getRootParentId(): ?int
    {
        return $this->rootParentId;
    }

    public function setRootParentId(?int $rootParentId): self
    {
        $this->rootParentId = $rootParentId;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }
}
