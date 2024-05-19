<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Group extends BaseModel
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('description')]
    private string|null $description;

    #[SerializedName('administrator')]
    private int $administrator;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('colour')]
    private string $colour;

    /** @var GroupTranslation[]|null */
    #[SerializedName('translations')]
    private array|null $translations;

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

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdministrator(): int
    {
        return $this->administrator;
    }

    public function setAdministrator(int $administrator): self
    {
        $this->administrator = $administrator;

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

    /**
     * @return GroupTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param GroupTranslation[]|null $translations
     */
    public function setTranslations(?array $translations): Group
    {
        $this->translations = $translations;

        return $this;
    }
}
