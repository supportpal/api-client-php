<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class SlaPlan extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('condition_group_type')]
    protected int $conditionGroupType;

    #[SerializedName('description')]
    protected string|null $description;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('order')]
    protected int|null $order;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('all_hours')]
    protected int $allHours;

    #[SerializedName('name')]
    protected string $name;

    /** @var SlaPlanTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    public function getId(): int
    {
        return $this->id;
    }

    public function getConditionGroupType(): int
    {
        return $this->conditionGroupType;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getAllHours(): int
    {
        return $this->allHours;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return SlaPlanTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
