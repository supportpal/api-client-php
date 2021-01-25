<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CategoryTranslation extends BaseTranslation
{
    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("category_id")
     */
    private $categoryId;

    /**
     * @var string
     * @SerializedName("slug")
     */
    private $slug;

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
     * @deprecated
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->categoryId;
    }

    /**
     * @deprecated
     * @param int $categoryId
     * @return self
     */
    public function setTypeId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Invalid property in the model, this getter will be removed in the next major release
     * @deprecated
     * @return string
     */
    public function getDescription(): ?string
    {
        return null;
    }

    /**
     * Invalid property in the model, this setter will be removed in the next major release
     * @return self
     * @deprecated
     */
    public function setDescription(): self
    {
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     * @return CategoryTranslation
     */
    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }
}
