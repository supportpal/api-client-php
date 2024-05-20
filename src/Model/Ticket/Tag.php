<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Tag extends BaseModel
{
    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('colour')]
    private string $colour;

    #[SerializedName('colour_text')]
    private string $colourText;

    #[SerializedName('original_name')]
    private string $originalName;

    /** @var TagTranslation[]|null */
    #[SerializedName('translations')]
    private array|null $translations;

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getColourText(): string
    {
        return $this->colourText;
    }

    public function setColourText(string $colourText): self
    {
        $this->colourText = $colourText;

        return $this;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    /**
     * @return TagTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param TagTranslation[]|null $translations
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
