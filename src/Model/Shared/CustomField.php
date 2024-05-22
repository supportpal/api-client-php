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
    protected string|null $regexErrorMessage;

    #[SerializedName('depends_on_field_id')]
    protected int|null $dependsOnFieldId;

    #[SerializedName('regex')]
    protected string|null $regex;

    #[SerializedName('locked')]
    protected bool $locked;

    #[SerializedName('updated_at')]
    protected int|null $updatedAt;

    #[SerializedName('created_at')]
    protected int|null $createdAt;

    #[SerializedName('depends_on_option_id')]
    protected int|null $dependsOnOptionId;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('name')]
    protected string|null $name;

    #[SerializedName('required')]
    protected bool|null $required;

    #[SerializedName('public')]
    protected bool|null $public;

    #[SerializedName('order')]
    protected int|null $order;

    #[SerializedName('description')]
    protected string|null $description;

    #[SerializedName('type')]
    protected int|null $type;

    #[SerializedName('encrypted')]
    protected int|null $encrypted;

    /** @var Option[]|null */
    protected ?array $options;

    /** @var Brand[]|null */
    protected ?array $brands;

    #[SerializedName('field_id')]
    protected int|null $fieldId = null;

    #[SerializedName('value')]
    protected string|null $value = null;

    public function getRegexErrorMessage(): ?string
    {
        return $this->regexErrorMessage;
    }

    public function getDependsOnFieldId(): ?int
    {
        return $this->dependsOnFieldId;
    }

    public function getRegex(): ?string
    {
        return $this->regex;
    }

    public function getLocked(): ?bool
    {
        return $this->locked;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function getDependsOnOptionId(): ?int
    {
        return $this->dependsOnOptionId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getRequired(): ?bool
    {
        return $this->required;
    }

    public function getPublic(): ?bool
    {
        return $this->public;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function getEncrypted(): ?int
    {
        return $this->encrypted;
    }

    /**
     * @return Option[]|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @return Brand[]|null
     */
    public function getBrands(): ?array
    {
        return $this->brands;
    }

    public function getFieldId(): ?int
    {
        return $this->fieldId;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
