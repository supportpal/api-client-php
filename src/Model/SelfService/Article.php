<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Article extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'pinned',
        'text',
        'protected',
        'title',
        'created_at',
        'plain_text',
        'published',
        'purified_text',
        'updated_at',
        'slug',
    ];

    /**
     * @var string
     * @SerializedName("purified_text")
     */
    private $purifiedText;

    /**
     * @var bool
     * @SerializedName("pinned")
     */
    private $pinned;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var string
     * @SerializedName("text")
     */
    private $text;

    /**
     * @var bool
     * @SerializedName("protected")
     */
    private $protected;

    /**
     * @var string
     * @SerializedName("title")
     */
    private $title;

    /**
     * @var int|null
     * @SerializedName("author_id")
     */
    private $authorId;

    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("excerpt")
     */
    private $excerpt;

    /**
     * @var string
     * @SerializedName("plain_text")
     */
    private $plainText;

    /**
     * @var int|null
     * @SerializedName("published_at")
     */
    private $publishedAt;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var string|null
     * @SerializedName("keywords")
     */
    private $keywords;

    /**
     * @var string
     * @SerializedName("slug")
     */
    private $slug;

    /**
     * @var bool
     * @SerializedName("published")
     */
    private $published;

    /**
     * @var Category[]|null
     * @SerializedName("categories")
     */
    private $categories;

    /**
     * @var Type[]|null
     * @SerializedName("types")
     */
    private $types;

    /**
     * @var ArticleAttachment[]|null
     * @SerializedName("attachments")
     */
    private $attachments;

    /**
     * @var int|null
     * @SerializedName("views")
     */
    private $views;

    /**
     * @var Tag[]|null
     * @SerializedName("tags")
     */
    private $tags;

    /**
     * @var ArticleTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

    /**
     * @var int|null
     * @SerializedName("positive_rating")
     */
    private $positiveRating;

    /**
     * @var int|null
     * @SerializedName("total_rating")
     */
    private $totalRating;

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
     * @return bool
     */
    public function getPinned(): bool
    {
        return $this->pinned;
    }

    /**
     * @param bool $pinned
     * @return self
     */
    public function setPinned(bool $pinned): self
    {
        $this->pinned = $pinned;

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
     * @return bool
     */
    public function getProtected(): bool
    {
        return $this->protected;
    }

    /**
     * @param bool $protected
     * @return self
     */
    public function setProtected(bool $protected): self
    {
        $this->protected = $protected;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublishedAt(): ?int
    {
        return $this->publishedAt;
    }

    /**
     * @param int|null $publishedAt
     * @return self
     */
    public function setPublishedAt(?int $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return self
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlainText(): string
    {
        return $this->plainText;
    }

    /**
     * @param string $plainText
     * @return self
     */
    public function setPlainText(string $plainText): self
    {
        $this->plainText = $plainText;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    /**
     * @param string|null $keywords
     * @return self
     */
    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @return bool
     */
    public function getPublished(): bool
    {
        return $this->published;
    }

    /**
     * @param bool $published
     * @return self
     */
    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    /**
     * @param string|null $excerpt
     * @return self
     */
    public function setExcerpt(?string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * @return string
     */
    public function getPurifiedText(): string
    {
        return $this->purifiedText;
    }

    /**
     * @param string $purifiedText
     * @return self
     */
    public function setPurifiedText(string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return self
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Category[]|null
     */
    public function getCategories(): ?array
    {
        return $this->categories;
    }

    /**
     * @param Category[]|null $categories
     * @return self
     */
    public function setCategories(?array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return Type[]|null
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @param Type[]|null $types
     * @return Article
     */
    public function setTypes(?array $types): Article
    {
        $this->types = $types;

        return $this;
    }

    /**
     * @return ArticleAttachment[]|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param ArticleAttachment[]|null $attachments
     * @return self
     */
    public function setAttachments(?array $attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getViews(): ?int
    {
        return $this->views;
    }

    /**
     * @param int|null $views
     * @return self
     */
    public function setViews(?int $views): self
    {
        $this->views = $views;

        return $this;
    }

    /**
     * @return Tag[]|null
1     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param Tag[]|null $tags
     * @return self
     */
    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return ArticleTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param ArticleTranslation[]|null $translations
     * @return self
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPositiveRating(): ?int
    {
        return $this->positiveRating;
    }

    /**
     * @param int|null $positiveRating
     * @return self
     */
    public function setPositiveRating(?int $positiveRating): self
    {
        $this->positiveRating = $positiveRating;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalRating(): ?int
    {
        return $this->totalRating;
    }

    /**
     * @param int|null $totalRating
     * @return self
     */
    public function setTotalRating(?int $totalRating): self
    {
        $this->totalRating = $totalRating;

        return $this;
    }
}
