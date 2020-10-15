<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Group extends BaseModel
{
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
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var string
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var int
     * @SerializedName("administrator")
     */
    private $administrator;

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
     * @var GroupTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getAdministrator(): int
    {
        return $this->administrator;
    }

    /**
     * @param int $administrator
     * @return self
     */
    public function setAdministrator(int $administrator): self
    {
        $this->administrator = $administrator;

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
     * @return GroupTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param GroupTranslation[]|null $translations
     * @return Group
     */
    public function setTranslations(?array $translations): Group
    {
        $this->translations = $translations;

        return $this;
    }
}
