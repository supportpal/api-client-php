<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ArticleType extends BaseModel
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

    /**
     * @var string|null
     * @SerializedName("icon")
     */
    private $icon;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var string
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var int
     * @SerializedName("brand_id")
     */
    private $brandId;

    /**
     * @var int|null
     * @SerializedName("article_ordering")
     */
    private $articleOrdering;

    /**
     * @var string|null
     * @SerializedName("slug")
     */
    private $slug;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int
     * @SerializedName("internal")
     */
    private $internal;

    /**
     * @var int|null
     * @SerializedName("show_on_dashboard")
     */
    private $showOnDashboard;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int|null
     * @SerializedName("view")
     */
    private $view;

    /**
     * @var int
     * @SerializedName("protected")
     */
    private $protected;

    /**
     * @var int|null
     * @SerializedName("order")
     */
    private $order;

    /**
     * @var string|null
     * @SerializedName("external_link")
     */
    private $externalLink;

    /**
     * @var int
     * @SerializedName("enabled")
     */
    private $enabled;

    /**
     * @var int
     * @SerializedName("content")
     */
    private $content;

    /**
     * @var Brand|null
     * @SerializedName("brand")
     */
    private $brand;

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     * @return self
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     * @return self
     */
    public function setBrandId(int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getArticleOrdering(): ?int
    {
        return $this->articleOrdering;
    }

    /**
     * @param int|null $articleOrdering
     * @return self
     */
    public function setArticleOrdering(?int $articleOrdering): self
    {
        $this->articleOrdering = $articleOrdering;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     * @return self
     */
    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

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
     * @return int
     */
    public function getInternal(): int
    {
        return $this->internal;
    }

    /**
     * @param int $internal
     * @return self
     */
    public function setInternal(int $internal): self
    {
        $this->internal = $internal;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getShowOnDashboard(): ?int
    {
        return $this->showOnDashboard;
    }

    /**
     * @param int|null $showOnDashboard
     * @return self
     */
    public function setShowOnDashboard(?int $showOnDashboard): self
    {
        $this->showOnDashboard = $showOnDashboard;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getView(): ?int
    {
        return $this->view;
    }

    /**
     * @param int|null $view
     * @return self
     */
    public function setView(?int $view): self
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @return int
     */
    public function getProtected(): int
    {
        return $this->protected;
    }

    /**
     * @param int $protected
     * @return self
     */
    public function setProtected(int $protected): self
    {
        $this->protected = $protected;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * @param int|null $order
     * @return self
     */
    public function setOrder(?int $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalLink(): ?string
    {
        return $this->externalLink;
    }

    /**
     * @param string|null $externalLink
     * @return self
     */
    public function setExternalLink(?string $externalLink): self
    {
        $this->externalLink = $externalLink;

        return $this;
    }

    /**
     * @return int
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * @param int $enabled
     * @return self
     */
    public function setEnabled(int $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return int
     */
    public function getContent(): int
    {
        return $this->content;
    }

    /**
     * @param int $content
     * @return self
     */
    public function setContent(int $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Brand|null
     */
    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     * @return self
     */
    public function setBrand(Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }
}
