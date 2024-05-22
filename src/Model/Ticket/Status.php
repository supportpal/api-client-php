<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Status extends BaseModel
{
    #[SerializedName('colour')]
    protected string $colour;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('order')]
    protected int|null $order;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('icon_without_tooltip')]
    protected string $iconWithoutTooltip;

    #[SerializedName('icon')]
    protected string $icon;

    #[SerializedName('auto_close')]
    protected bool $autoClose;

    /** @var StatusTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    public function getColour(): string
    {
        return $this->colour;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getIconWithoutTooltip(): string
    {
        return $this->iconWithoutTooltip;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getAutoClose(): bool
    {
        return $this->autoClose;
    }

    /**
     * @return StatusTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
