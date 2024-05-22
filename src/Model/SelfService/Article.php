<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

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

    #[SerializedName('purified_text')]
    private string $purifiedText;

    #[SerializedName('pinned')]
    private bool $pinned;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('text')]
    private string $text;

    #[SerializedName('protected')]
    private bool $protected;

    #[SerializedName('title')]
    private string $title;

    #[SerializedName('author_id')]
    private int|null $authorId;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('excerpt')]
    private string|null $excerpt;

    #[SerializedName('plain_text')]
    private string $plainText;

    #[SerializedName('published_at')]
    private int|null $publishedAt;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('keywords')]
    private string|null $keywords;

    #[SerializedName('slug')]
    private string $slug;

    #[SerializedName('published')]
    private bool $published;

    /** @var Category[]|null */
    #[SerializedName('categories')]
    private array|null $categories;

    /** @var Type[]|null */
    #[SerializedName('types')]
    private array|null $types;

    /** @var ArticleAttachment[]|null */
    #[SerializedName('attachments')]
    private array|null $attachments;

    #[SerializedName('views')]
    private int|null $views = null;

    /** @var Tag[]|null */
    #[SerializedName('tags')]
    private array|null $tags;

    /** @var ArticleTranslation[]|null */
    #[SerializedName('translations')]
    private array|null $translations;

    #[SerializedName('positive_rating')]
    private int|null $positiveRating = null;

    #[SerializedName('total_rating')]
    private int|null $totalRating = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getPinned(): bool
    {
        return $this->pinned;
    }

    public function setPinned(bool $pinned): self
    {
        $this->pinned = $pinned;

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

    public function getProtected(): bool
    {
        return $this->protected;
    }

    public function setProtected(bool $protected): self
    {
        $this->protected = $protected;

        return $this;
    }

    public function getPublishedAt(): ?int
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?int $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPlainText(): string
    {
        return $this->plainText;
    }

    public function setPlainText(string $plainText): self
    {
        $this->plainText = $plainText;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getPublished(): bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(?string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getPurifiedText(): string
    {
        return $this->purifiedText;
    }

    public function setPurifiedText(string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;

        return $this;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

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
     */
    public function setAttachments(?array $attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

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
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }

    public function getPositiveRating(): ?int
    {
        return $this->positiveRating;
    }

    public function setPositiveRating(?int $positiveRating): self
    {
        $this->positiveRating = $positiveRating;

        return $this;
    }

    public function getTotalRating(): ?int
    {
        return $this->totalRating;
    }

    public function setTotalRating(?int $totalRating): self
    {
        $this->totalRating = $totalRating;

        return $this;
    }
}
