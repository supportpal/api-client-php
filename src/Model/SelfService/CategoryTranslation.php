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
     * @SerializedName("type_id")
     */
    private $typeId;

    /**
     * @var string
     * @SerializedName("slug")
     */
    private $slug;

    /**
     * @var string
     * @SerializedName("description")
     */
    private $description;

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
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     * @return self
     */
    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;

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
}
