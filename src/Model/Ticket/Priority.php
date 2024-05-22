<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Department\Department;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Priority extends BaseModel
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('colour')]
    private string $colour;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('order')]
    private int|null $order;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('icon')]
    private string $icon;

    #[SerializedName('icon_without_tooltip')]
    private string $iconWithoutTooltip;

    /** @var Department[]|null */
    private ?array $departments;

    /** @var PriorityTranslation[]|null */
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

    public function getColour(): string
    {
        return $this->colour;
    }

    public function setColour(string $colour): self
    {
        $this->colour = $colour;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIconWithoutTooltip(): string
    {
        return $this->iconWithoutTooltip;
    }

    public function setIconWithoutTooltip(string $iconWithoutTooltip): self
    {
        $this->iconWithoutTooltip = $iconWithoutTooltip;

        return $this;
    }

    /**
     * @return Department[]|null
     */
    public function getDepartments(): ?array
    {
        return $this->departments;
    }

    /**
     * @param Department[]|null $departments
     */
    public function setDepartments(?array $departments): self
    {
        $this->departments = $departments;

        return $this;
    }

    /**
     * @return PriorityTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param PriorityTranslation[]|null $translations
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
