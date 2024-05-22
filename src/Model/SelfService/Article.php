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
    protected string $purifiedText;

    #[SerializedName('pinned')]
    protected bool $pinned;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('text')]
    protected string $text;

    #[SerializedName('protected')]
    protected bool $protected;

    #[SerializedName('title')]
    protected string $title;

    #[SerializedName('author_id')]
    protected int|null $authorId;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('excerpt')]
    protected string|null $excerpt;

    #[SerializedName('plain_text')]
    protected string $plainText;

    #[SerializedName('published_at')]
    protected int|null $publishedAt;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('keywords')]
    protected string|null $keywords;

    #[SerializedName('slug')]
    protected string $slug;

    #[SerializedName('published')]
    protected bool $published;

    /** @var Category[]|null */
    #[SerializedName('categories')]
    protected array|null $categories;

    /** @var Type[]|null */
    #[SerializedName('types')]
    protected array|null $types;

    /** @var ArticleAttachment[]|null */
    #[SerializedName('attachments')]
    protected array|null $attachments;

    #[SerializedName('views')]
    protected int|null $views = null;

    /** @var Tag[]|null */
    #[SerializedName('tags')]
    protected array|null $tags;

    /** @var ArticleTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    #[SerializedName('positive_rating')]
    protected int|null $positiveRating = null;

    #[SerializedName('total_rating')]
    protected int|null $totalRating = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    public function getPinned(): bool
    {
        return $this->pinned;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getProtected(): bool
    {
        return $this->protected;
    }

    public function getPublishedAt(): ?int
    {
        return $this->publishedAt;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getPlainText(): string
    {
        return $this->plainText;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function getPublished(): bool
    {
        return $this->published;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function getPurifiedText(): string
    {
        return $this->purifiedText;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return Category[]|null
     */
    public function getCategories(): ?array
    {
        return $this->categories;
    }

    /**
     * @return Type[]|null
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @return ArticleAttachment[]|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    /**
     * @return Tag[]|null
1     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @return ArticleTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    public function getPositiveRating(): ?int
    {
        return $this->positiveRating;
    }

    public function getTotalRating(): ?int
    {
        return $this->totalRating;
    }
}
