<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Option extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('order')]
    protected int|null $order;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('field_id')]
    protected int $fieldId;

    #[SerializedName('value')]
    protected string $value;

    /** @var OptionTranslation[]|null */
    #[SerializedName('translations')]
    protected ?array $translations;

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

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getFieldId(): int
    {
        return $this->fieldId;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return OptionTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
