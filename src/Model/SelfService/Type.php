<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Type extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'brand_id',
        'description',
        'content',
        'enabled',
        'name',
        'created_at',
        'protected',
        'updated_at',
        'internal',
    ];

    #[SerializedName('icon')]
    private string|null $icon;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('description')]
    private string $description;

    #[SerializedName('brand_id')]
    private int $brandId;

    #[SerializedName('article_ordering')]
    private int|null $articleOrdering;

    #[SerializedName('slug')]
    private string|null $slug;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('internal')]
    private bool $internal;

    #[SerializedName('show_on_dashboard')]
    private int|null $showOnDashboard;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('view')]
    private int|null $view;

    #[SerializedName('protected')]
    private bool $protected;

    #[SerializedName('order')]
    private int|null $order;

    #[SerializedName('external_link')]
    private string|null $externalLink;

    #[SerializedName('enabled')]
    private bool $enabled;

    #[SerializedName('content')]
    private int $content;

    #[SerializedName('brand')]
    private Brand|null $brand;

    /** @var TypeTranslation[]|null */
    #[SerializedName('translations')]
    private array|null $translations;

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function setBrandId(int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    public function getArticleOrdering(): ?int
    {
        return $this->articleOrdering;
    }

    public function setArticleOrdering(?int $articleOrdering): self
    {
        $this->articleOrdering = $articleOrdering;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

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

    public function getInternal(): bool
    {
        return $this->internal;
    }

    public function setInternal(bool $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    public function getShowOnDashboard(): ?int
    {
        return $this->showOnDashboard;
    }

    public function setShowOnDashboard(?int $showOnDashboard): self
    {
        $this->showOnDashboard = $showOnDashboard;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getView(): ?int
    {
        return $this->view;
    }

    public function setView(?int $view): self
    {
        $this->view = $view;

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

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getExternalLink(): ?string
    {
        return $this->externalLink;
    }

    public function setExternalLink(?string $externalLink): self
    {
        $this->externalLink = $externalLink;

        return $this;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getContent(): int
    {
        return $this->content;
    }

    public function setContent(int $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return TypeTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param TypeTranslation[]|null $translations
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
