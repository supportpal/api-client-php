<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TypeTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('type_id')]
    protected int $typeId;

    #[SerializedName('description')]
    protected string $description;

    #[SerializedName('slug')]
    protected string|null $slug;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }
}
