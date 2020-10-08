<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Department\Department;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CustomField extends BaseModel
{
    /**
     * @var string|null
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var int
     * @SerializedName("public")
     */
    private $public;

    /**
     * @var int
     * @SerializedName("type")
     */
    private $type;

    /**
     * @var int
     * @SerializedName("purge")
     */
    private $purge;

    /**
     * @var int|null
     * @SerializedName("depends_on_field_id")
     */
    private $dependsOnFieldId;

    /**
     * @var int|null
     * @SerializedName("depends_on_option_id")
     */
    private $dependsOnOptionId;

    /**
     * @var int
     * @SerializedName("required")
     */
    private $required;

    /**
     * @var int
     * @SerializedName("locked")
     */
    private $locked;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int
     * @SerializedName("order")
     */
    private $order;

    /**
     * @var int
     * @SerializedName("encrypted")
     */
    private $encrypted;

    /**
     * @var string|null
     * @SerializedName("regex_error_message")
     */
    private $regexErrorMessage;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("regex")
     */
    private $regex;

    /**
     * @var array<mixed>
     * @SerializedName("options")
     */
    private $options;

    /**
     * @var Brand[]
     * @SerializedName("brands")
     */
    private $brands;

    /**
     * @var Department[]
     * @SerializedName("departments")
     */
    private $departments;

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
    public function getPublic(): int
    {
        return $this->public;
    }

    /**
     * @param int $public
     * @return self
     */
    public function setPublic(int $public): self
    {
        $this->public = $public;

        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return self
     */
    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getPurge(): int
    {
        return $this->purge;
    }

    /**
     * @param int $purge
     * @return self
     */
    public function setPurge(int $purge): self
    {
        $this->purge = $purge;

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
     * @return int
     */
    public function getRequired(): int
    {
        return $this->required;
    }

    /**
     * @param int $required
     * @return self
     */
    public function setRequired(int $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @return int
     */
    public function getLocked(): int
    {
        return $this->locked;
    }

    /**
     * @param int $locked
     * @return self
     */
    public function setLocked(int $locked): self
    {
        $this->locked = $locked;

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
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return self
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return int
     */
    public function getEncrypted(): int
    {
        return $this->encrypted;
    }

    /**
     * @param int $encrypted
     * @return self
     */
    public function setEncrypted(int $encrypted): self
    {
        $this->encrypted = $encrypted;

        return $this;
    }

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
     * @return array<mixed>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array<mixed> $options
     * @return self
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return Brand[]
     */
    public function getBrands(): array
    {
        return $this->brands;
    }

    /**
     * @param Brand[] $brands
     * @return self
     */
    public function setBrands(array $brands): self
    {
        $this->brands = $brands;

        return $this;
    }

    /**
     * @return Department[]
     */
    public function getDepartments(): array
    {
        return $this->departments;
    }

    /**
     * @param Department[] $departments
     * @return self
     */
    public function setDepartments(array $departments): self
    {
        $this->departments = $departments;

        return $this;
    }
}
