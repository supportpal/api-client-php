<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use Symfony\Component\Serializer\Attribute\SerializedName;

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

    #[SerializedName('regex_error_message')]
    private string|null $regexErrorMessage;

    #[SerializedName('depends_on_field_id')]
    private int|null $dependsOnFieldId;

    #[SerializedName('regex')]
    private string|null $regex;

    #[SerializedName('locked')]
    private bool $locked;

    #[SerializedName('updated_at')]
    private int|null $updatedAt;

    #[SerializedName('created_at')]
    private int|null $createdAt;

    #[SerializedName('depends_on_option_id')]
    private int|null $dependsOnOptionId;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('name')]
    private string|null $name;

    #[SerializedName('required')]
    private bool|null $required;

    #[SerializedName('public')]
    private bool|null $public;

    #[SerializedName('order')]
    private int|null $order;

    #[SerializedName('description')]
    private string|null $description;

    #[SerializedName('type')]
    private int|null $type;

    #[SerializedName('encrypted')]
    private int|null $encrypted;

    /** @var Option[]|null */
    private ?array $options;

    /** @var Brand[]|null */
    private ?array $brands;

    #[SerializedName('field_id')]
    private int|null $fieldId = null;

    #[SerializedName('value')]
    private string|null $value = null;

    public function getRegexErrorMessage(): ?string
    {
        return $this->regexErrorMessage;
    }

    public function setRegexErrorMessage(?string $regexErrorMessage): self
    {
        $this->regexErrorMessage = $regexErrorMessage;

        return $this;
    }

    public function getDependsOnFieldId(): ?int
    {
        return $this->dependsOnFieldId;
    }

    public function setDependsOnFieldId(?int $dependsOnFieldId): self
    {
        $this->dependsOnFieldId = $dependsOnFieldId;

        return $this;
    }

    public function getRegex(): ?string
    {
        return $this->regex;
    }

    public function setRegex(?string $regex): self
    {
        $this->regex = $regex;

        return $this;
    }

    public function getLocked(): ?bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): self
    {
        $this->locked = $locked;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDependsOnOptionId(): ?int
    {
        return $this->dependsOnOptionId;
    }

    public function setDependsOnOptionId(?int $dependsOnOptionId): self
    {
        $this->dependsOnOptionId = $dependsOnOptionId;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRequired(): ?bool
    {
        return $this->required;
    }

    public function setRequired(?bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    public function getPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(?bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): self
    {
        $this->order = $order;

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEncrypted(): ?int
    {
        return $this->encrypted;
    }

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
     */
    public function setBrands(?array $brands): self
    {
        $this->brands = $brands;

        return $this;
    }

    public function getFieldId(): ?int
    {
        return $this->fieldId;
    }

    public function setFieldId(?int $fieldId): self
    {
        $this->fieldId = $fieldId;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
