<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Group extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('description')]
    protected string|null $description;

    #[SerializedName('administrator')]
    protected int $administrator;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('colour')]
    protected string $colour;

    /** @var GroupTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getAdministrator(): int
    {
        return $this->administrator;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @return GroupTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
