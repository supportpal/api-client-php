<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Status extends BaseModel
{
    /**
     * @var string
     * @SerializedName("colour")
     */
    private $colour;

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
     * @var int|null
     * @SerializedName("order")
     */
    private $order;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var string
     * @SerializedName("icon_without_tooltip")
     */
    private $iconWithoutTooltip;

    /**
     * @var string
     * @SerializedName("icon")
     */
    private $icon;

    /**
     * @var int
     * @SerializedName("auto_close")
     */
    private $autoClose;

    /**
     * @var StatusTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

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
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * @param int|null $order
     * @return self
     */
    public function setOrder(?int $order): self
    {
        $this->order = $order;

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
     * @return string
     */
    public function getIconWithoutTooltip(): string
    {
        return $this->iconWithoutTooltip;
    }

    /**
     * @param string $iconWithoutTooltip
     * @return self
     */
    public function setIconWithoutTooltip(string $iconWithoutTooltip): self
    {
        $this->iconWithoutTooltip = $iconWithoutTooltip;

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return self
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return int
     */
    public function getAutoClose(): int
    {
        return $this->autoClose;
    }

    /**
     * @param int $autoClose
     * @return self
     */
    public function setAutoClose(int $autoClose): self
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
     * @return self
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
