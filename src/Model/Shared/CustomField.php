<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use Symfony\Component\Serializer\Annotation\SerializedName;

abstract class CustomField extends BaseModel
{
    public const TYPE_BOOLEAN = 0;

    public const TYPE_CHECKBOX = 1;

    public const TYPE_CHECKLIST = 2;

    public const TYPE_DATE = 3;

    public const TYPE_MULTIPLE = 4;

    public const TYPE_OPTIONS = 5;

    public const TYPE_PASSWORD = 6;

    public const TYPE_RADIO = 7;

    public const TYPE_TEXT = 8;

    public const TYPE_TEXTAREA = 9;

    public const TYPE_RATING = 10;

    /**
     * @var string|null
     * @SerializedName("regex_error_message")
     */
    private $regexErrorMessage;

    /**
     * @var int|null
     * @SerializedName("depends_on_field_id")
     */
    private $dependsOnFieldId;

    /**
     * @var string|null
     * @SerializedName("regex")
     */
    private $regex;

    /**
     * @var int|null
     * @SerializedName("locked")
     */
    private $locked;

    /**
     * @var int|null
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int|null
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var int|null
     * @SerializedName("depends_on_option_id")
     */
    private $dependsOnOptionId;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int|null
     * @SerializedName("required")
     */
    private $required;

    /**
     * @var int|null
     * @SerializedName("public")
     */
    private $public;

    /**
     * @var int|null
     * @SerializedName("order")
     */
    private $order;

    /**
     * @var string|null
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var int|null
     * @SerializedName("type")
     */
    private $type;

    /**
     * @var int|null
     * @SerializedName("encrypted")
     */
    private $encrypted;

    /** @var Option[]|null */
    private $options;

    /** @var Brand[]|null */
    private $brands;

    /**
     * @var int|null
     * @SerializedName("field_id")
     */
    private $fieldId;

    /**
     * @var string|null
     * @SerializedName("value")
     */
    private $value;

    /**
     * @return string|null
     */
    public function getRegexErrorMessage(): ?string
    {
        return $this->regexErrorMessage;
    }

    /**
     * @param string|null $regexErrorMessage
     * @return self
     */
    public function setRegexErrorMessage(?string $regexErrorMessage): self
    {
        $this->regexErrorMessage = $regexErrorMessage;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDependsOnFieldId(): ?int
    {
        return $this->dependsOnFieldId;
    }

    /**
     * @param int|null $dependsOnFieldId
     * @return self
     */
    public function setDependsOnFieldId(?int $dependsOnFieldId): self
    {
        $this->dependsOnFieldId = $dependsOnFieldId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegex(): ?string
    {
        return $this->regex;
    }

    /**
     * @param string|null $regex
     * @return self
     */
    public function setRegex(?string $regex): self
    {
        $this->regex = $regex;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLocked(): ?int
    {
        return $this->locked;
    }

    /**
     * @param int|null $locked
     * @return self
     */
    public function setLocked(?int $locked): self
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    /**
     * @param int|null $updatedAt
     * @return self
     */
    public function setUpdatedAt(?int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    /**
     * @param int|null $createdAt
     * @return self
     */
    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDependsOnOptionId(): ?int
    {
        return $this->dependsOnOptionId;
    }

    /**
     * @param int|null $dependsOnOptionId
     * @return self
     */
    public function setDependsOnOptionId(?int $dependsOnOptionId): self
    {
        $this->dependsOnOptionId = $dependsOnOptionId;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRequired(): ?int
    {
        return $this->required;
    }

    /**
     * @param int|null $required
     * @return self
     */
    public function setRequired(?int $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublic(): ?int
    {
        return $this->public;
    }

    /**
     * @param int|null $public
     * @return self
     */
    public function setPublic(?int $public): self
    {
        $this->public = $public;

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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     * @return self
     */
    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEncrypted(): ?int
    {
        return $this->encrypted;
    }

    /**
     * @param int|null $encrypted
     * @return self
     */
    public function setEncrypted(?int $encrypted): self
    {
        $this->encrypted = $encrypted;

        return $this;
    }

    /**
     * @return Option[]|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param Option[]|null $options
     * @return self
     */
    public function setOptions(?array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return Brand[]|null
     */
    public function getBrands(): ?array
    {
        return $this->brands;
    }

    /**
     * @param Brand[]|null $brands
     * @return self
     */
    public function setBrands(?array $brands): self
    {
        $this->brands = $brands;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFieldId(): ?int
    {
        return $this->fieldId;
    }

    /**
     * @param int|null $fieldId
     * @return self
     */
    public function setFieldId(?int $fieldId): self
    {
        $this->fieldId = $fieldId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
