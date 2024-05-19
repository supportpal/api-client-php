<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class UserCustomFieldTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('user_custom_field_id')]
    private int $userCustomFieldId;

    #[SerializedName('description')]
    private string|null $description;

    #[SerializedName('regex_error_message')]
    private string|null $regexErrorMessage;

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

    public function getUserCustomFieldId(): int
    {
        return $this->userCustomFieldId;
    }

    public function setUserCustomFieldId(int $userCustomFieldId): self
    {
        $this->userCustomFieldId = $userCustomFieldId;

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

    public function getRegexErrorMessage(): ?string
    {
        return $this->regexErrorMessage;
    }

    public function setRegexErrorMessage(?string $regexErrorMessage): self
    {
        $this->regexErrorMessage = $regexErrorMessage;

        return $this;
    }
}
