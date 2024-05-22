<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Category extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('type_id')]
    protected int $typeId;

    #[SerializedName('parent_id')]
    protected int|null $parentId;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('slug')]
    protected string $slug;

    #[SerializedName('public')]
    protected bool $public;

    #[SerializedName('parent_public')]
    protected bool $parentPublic;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('frontend_url')]
    protected string $frontendUrl;

    #[SerializedName('type')]
    protected Type $type;

    /** @var CategoryTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    #[SerializedName('pinned')]
    protected int|null $pinned = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getPublic(): bool
    {
        return $this->public;
    }

    public function getParentPublic(): bool
    {
        return $this->parentPublic;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getFrontendUrl(): string
    {
        return $this->frontendUrl;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @return CategoryTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    public function getPinned(): ?int
    {
        return $this->pinned;
    }
}
