<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Channel extends BaseModel
{
    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("version")
     */
    private $version;

    /**
     * @var int
     * @SerializedName("enabled")
     */
    private $enabled;

    /**
     * @var int
     * @SerializedName("upgrade_available")
     */
    private $upgradeAvailable;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var string
     * @SerializedName("formatted_name")
     */
    private $formattedName;

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
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string|null $version
     * @return self
     */
    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return int
     */
    public function getEnabled(): int
    {
        return $this->enabled;
    }

    /**
     * @param int $enabled
     * @return self
     */
    public function setEnabled(int $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpgradeAvailable(): int
    {
        return $this->upgradeAvailable;
    }

    /**
     * @param int $upgradeAvailable
     * @return self
     */
    public function setUpgradeAvailable(int $upgradeAvailable): self
    {
        $this->upgradeAvailable = $upgradeAvailable;

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
    public function getFormattedName(): string
    {
        return $this->formattedName;
    }

    /**
     * @param string $formattedName
     * @return self
     */
    public function setFormattedName(string $formattedName): self
    {
        $this->formattedName = $formattedName;

        return $this;
    }
}
