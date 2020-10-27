<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Category extends BaseModel
{
    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

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
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var string
     * @SerializedName("slug")
     */
    private $slug;

    /**
     * @var bool
     * @SerializedName("public")
     */
    private $public;

    /**
     * @var bool
     * @SerializedName("parent_public")
     */
    private $parentPublic;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var string
     * @SerializedName("frontend_url")
     */
    private $frontendUrl;

    /**
     * @var Type
     * @SerializedName("type")
     */
    private $type;

    /**
     * @var CategoryTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

    /**
     * @var int|null
     * @SerializedName("pinned")
     */
    private $pinned;

    /**
     * @return int
     */
    public function getId(): int
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
     * @return bool
     */
    public function getPublic(): bool
    {
        return $this->public;
    }

    /**
     * @param bool $public
     * @return self
     */
    public function setPublic(bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    /**
     * @return bool
     */
    public function getParentPublic(): bool
    {
        return $this->parentPublic;
    }

    /**
     * @param bool $parentPublic
     * @return self
     */
    public function setParentPublic(bool $parentPublic): self
    {
        $this->parentPublic = $parentPublic;

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
    public function getFrontendUrl(): string
    {
        return $this->frontendUrl;
    }

    /**
     * @param string $frontendUrl
     * @return self
     */
    public function setFrontendUrl(string $frontendUrl): self
    {
        $this->frontendUrl = $frontendUrl;

        return $this;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @param Type $type
     * @return self
     */
    public function setType(Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return CategoryTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param CategoryTranslation[]|null $translations
     * @return self
     */
    public function setTranslations(?array $translations): Category
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPinned(): ?int
    {
        return $this->pinned;
    }

    /**
     * @param int|null $pinned
     * @return self
     */
    public function setPinned(?int $pinned): self
    {
        $this->pinned = $pinned;

        return $this;
    }
}
