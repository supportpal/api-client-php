<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class UserCustomFieldTranslation extends BaseTranslation
{
    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("user_custom_field_id")
     */
    private $userCustomFieldId;

    /**
     * @var string|null
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var string|null
     * @SerializedName("purified_description")
     */
    private $purifiedDescription;

    /**
     * @var string|null
     * @SerializedName("regex_error_message")
     */
    private $regexErrorMessage;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

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
    public function getUserCustomFieldId(): int
    {
        return $this->userCustomFieldId;
    }

    /**
     * @param int $userCustomFieldId
     * @return self
     */
    public function setUserCustomFieldId(int $userCustomFieldId): self
    {
        $this->userCustomFieldId = $userCustomFieldId;

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
     * @return string|null
     */
    public function getPurifiedDescription(): ?string
    {
        return $this->purifiedDescription;
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setPurifiedDescription(?string $description): self
    {
        $this->purifiedDescription = $description;

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
}
