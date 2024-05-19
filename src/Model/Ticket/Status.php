<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Status extends BaseModel
{
    #[SerializedName('colour')]
     private string $colour;

    #[SerializedName('id')]
     private int $id;

    #[SerializedName('created_at')]
     private int $createdAt;

    #[SerializedName('order')]
     private int|null $order;

    #[SerializedName('name')]
     private string $name;

    #[SerializedName('updated_at')]
     private int $updatedAt;

    #[SerializedName('icon_without_tooltip')]
     private string $iconWithoutTooltip;

    #[SerializedName('icon')]
     private string $icon;

    #[SerializedName('auto_close')]
     private bool $autoClose;

    /** @var StatusTranslation[]|null */
    #[SerializedName('translations')]
     private array|null $translations;

    public function getColour(): string
    {
        return $this->colour;
    }

    public function setColour(string $colour): self
    {
        $this->colour = $colour;

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

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): self
    {
        $this->order = $order;

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

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getAutoClose(): bool
    {
        return $this->autoClose;
    }

    public function setAutoClose(bool $autoClose): self
    {
        $this->autoClose = $autoClose;

        return $this;
    }

    /**
     * @return StatusTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param StatusTranslation[]|null $translations
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
