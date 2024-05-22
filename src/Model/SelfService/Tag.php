<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Tag extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('slug')]
    protected string $slug;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    /** @var TagTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @return TagTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
