<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Department\Department;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Priority extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('colour')]
    protected string $colour;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('order')]
    protected int|null $order;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('icon')]
    protected string $icon;

    #[SerializedName('icon_without_tooltip')]
    protected string $iconWithoutTooltip;

    /** @var Department[]|null */
    protected ?array $departments;

    /** @var PriorityTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    public function getId(): int
    {
        return $this->id;
    }

    public function getColour(): string
    {
        return $this->colour;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getIconWithoutTooltip(): string
    {
        return $this->iconWithoutTooltip;
    }

    /**
     * @return Department[]|null
     */
    public function getDepartments(): ?array
    {
        return $this->departments;
    }

    /**
     * @return PriorityTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
