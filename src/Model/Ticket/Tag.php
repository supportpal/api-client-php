<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Tag extends BaseModel
{
    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var string
     * @SerializedName("colour")
     */
    private $colour;

    /**
     * @var string
     * @SerializedName("colour_text")
     */
    private $colourText;

    /**
     * @var string
     * @SerializedName("original_name")
     */
    private $originalName;

    /**
     * @var TagTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return self
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return self
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @param string $colour
     * @return self
     */
    public function setColour(string $colour): self
    {
        $this->colour = $colour;

        return $this;
    }

    /**
     * @return string
     */
    public function getColourText(): string
    {
        return $this->colourText;
    }

    /**
     * @param string $colourText
     * @return self
     */
    public function setColourText(string $colourText): self
    {
        $this->colourText = $colourText;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     * @return self
     */
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
     * @return self
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
