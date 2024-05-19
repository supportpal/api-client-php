<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CategoryTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('category_id')]
    private int $categoryId;

    #[SerializedName('slug')]
    private string $slug;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

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

    /**
     * @deprecated
     */
    public function getTypeId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     *@deprecated
     */
    public function setTypeId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Invalid property in the model, this getter will be removed in the next major release
     * @deprecated
     */
    public function getDescription(): ?string
    {
        return null;
    }

    /**
     * Invalid property in the model, this setter will be removed in the next major release
     * @deprecated
     */
    public function setDescription(): self
    {
        return $this;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }
}
