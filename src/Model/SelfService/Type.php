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
    protected string|null $icon;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('description')]
    protected string $description;

    #[SerializedName('brand_id')]
    protected int $brandId;

    #[SerializedName('article_ordering')]
    protected int|null $articleOrdering;

    #[SerializedName('slug')]
    protected string|null $slug;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('internal')]
    protected bool $internal;

    #[SerializedName('show_on_dashboard')]
    protected int|null $showOnDashboard;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('view')]
    protected int|null $view;

    #[SerializedName('protected')]
    protected bool $protected;

    #[SerializedName('order')]
    protected int|null $order;

    #[SerializedName('external_link')]
    protected string|null $externalLink;

    #[SerializedName('enabled')]
    protected bool $enabled;

    #[SerializedName('content')]
    protected int $content;

    #[SerializedName('brand')]
    protected Brand|null $brand;

    /** @var TypeTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function getArticleOrdering(): ?int
    {
        return $this->articleOrdering;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getInternal(): bool
    {
        return $this->internal;
    }

    public function getShowOnDashboard(): ?int
    {
        return $this->showOnDashboard;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getView(): ?int
    {
        return $this->view;
    }

    public function getProtected(): bool
    {
        return $this->protected;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function getExternalLink(): ?string
    {
        return $this->externalLink;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function getContent(): int
    {
        return $this->content;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    /**
     * @return TypeTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
