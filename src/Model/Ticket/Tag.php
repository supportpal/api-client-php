<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Tag extends BaseModel
{
    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('colour')]
    protected string $colour;

    #[SerializedName('colour_text')]
    protected string $colourText;

    #[SerializedName('original_name')]
    protected string $originalName;

    /** @var TagTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations = null;

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColour(): string
    {
        return $this->colour;
    }

    public function getColourText(): string
    {
        return $this->colourText;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @return TagTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
