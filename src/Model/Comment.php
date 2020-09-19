<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * This data class defines the Comment model data attributes
 * Class Comment
 * @package SupportPal\ApiClient\Model
 */
class Comment extends BaseModel implements Model
{
    public const REQUIRED_FIELDS = [
        'article_id',
        'type_id',
        'text',
    ];

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @SerializedName("text")
     */
    private $text;

    /**
     * @var int
     * @SerializedName("article_id")
     */
    private $articleId;

    /**
     * @var int
     * @SerializedName("type_id")
     */
    private $typeId;

    /**
     * @var int|null
     * @SerializedName("parent_id")
     */
    private $parentId;

    /**
     * @var int
     * @SerializedName("status")
     */
    private $status = 0;

    /**
     * @var int
     * @SerializedName("notify_reply")
     */
    private $notifyReply = 0;

    /**
     * @var int|null
     * @SerializedName("author_id")
     */
    private $authorId;

    /**
     * @var string|null
     * @SerializedName("purified_text")
     */
    private $purifiedText;

    /**
     * @var string|null
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var User|null
     * @SerializedName("author")
     */
    private $author;

    /**
     * @var Article|null
     * @SerializedName("article")
     */
    private $article;

    /**
     * @var ArticleType|null
     * @SerializedName("type")
     */
    private $type;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * @param int $articleId
     * @return self
     */
    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     * @return self
     */
    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @param int|null $parentId
     * @return self
     */
    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getNotifyReply(): int
    {
        return $this->notifyReply;
    }

    /**
     * @param int $notifyReply
     * @return self
     */
    public function setNotifyReply(int $notifyReply): self
    {
        $this->notifyReply = $notifyReply;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    /**
     * @param int|null $authorId
     * @return self
     */
    public function setAuthorId(?int $authorId): self
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPurifiedText(): ?string
    {
        return $this->purifiedText;
    }

    /**
     * @param string|null $purifiedText
     * @return self
     */
    public function setPurifiedText(?string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * @param User $author
     * @return self
     */
    public function setAuthor(User $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return Article|null
     */
    public function getArticle(): ?Article
    {
        return $this->article;
    }

    /**
     * @param Article $article
     * @return self
     */
    public function setArticle(Article $article): self
    {
        $this->article = $article;
        return $this;
    }

    /**
     * @return ArticleType|null
     */
    public function getType(): ?ArticleType
    {
        return $this->type;
    }

    /**
     * @param ArticleType $type
     * @return self
     */
    public function setType(ArticleType $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return self::REQUIRED_FIELDS;
    }
}
