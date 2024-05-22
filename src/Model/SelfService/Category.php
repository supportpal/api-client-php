<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Category extends BaseModel
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('type_id')]
    private int $typeId;

    #[SerializedName('parent_id')]
    private int|null $parentId;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('slug')]
    private string $slug;

    #[SerializedName('public')]
    private bool $public;

    #[SerializedName('parent_public')]
    private bool $parentPublic;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('frontend_url')]
    private string $frontendUrl;

    #[SerializedName('type')]
    private Type $type;

    /** @var CategoryTranslation[]|null */
    #[SerializedName('translations')]
    private array|null $translations;

    #[SerializedName('pinned')]
    private int|null $pinned = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPublic(): bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getParentPublic(): bool
    {
        return $this->parentPublic;
    }

    public function setParentPublic(bool $parentPublic): self
    {
        $this->parentPublic = $parentPublic;

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

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getFrontendUrl(): string
    {
        return $this->frontendUrl;
    }

    public function setFrontendUrl(string $frontendUrl): self
    {
        $this->frontendUrl = $frontendUrl;

        return $this;
    }

    public function getType(): Type
    {
        return $this->type;
    }

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
     */
    public function setTranslations(?array $translations): Category
    {
        $this->translations = $translations;

        return $this;
    }

    public function getPinned(): ?int
    {
        return $this->pinned;
    }

    public function setPinned(?int $pinned): self
    {
        $this->pinned = $pinned;

        return $this;
    }
}
