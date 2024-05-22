<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class SlaPlan extends BaseModel
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('condition_group_type')]
    private int $conditionGroupType;

    #[SerializedName('description')]
    private string|null $description;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('order')]
    private int|null $order;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('all_hours')]
    private int $allHours;

    #[SerializedName('name')]
    private string $name;

    /** @var SlaPlanTranslation[]|null */
    #[SerializedName('translations')]
    private array|null $translations;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getConditionGroupType(): int
    {
        return $this->conditionGroupType;
    }

    public function setConditionGroupType(int $conditionGroupType): self
    {
        $this->conditionGroupType = $conditionGroupType;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): self
    {
        $this->order = $order;

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

    public function getAllHours(): int
    {
        return $this->allHours;
    }

    public function setAllHours(int $allHours): self
    {
        $this->allHours = $allHours;

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

    /**
     * @return SlaPlanTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param SlaPlanTranslation[]|null $translations
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
