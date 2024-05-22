<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class UserCustomFieldTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('user_custom_field_id')]
    protected int $userCustomFieldId;

    #[SerializedName('description')]
    protected string|null $description;

    #[SerializedName('regex_error_message')]
    protected string|null $regexErrorMessage;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUserCustomFieldId(): int
    {
        return $this->userCustomFieldId;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getRegexErrorMessage(): ?string
    {
        return $this->regexErrorMessage;
    }
}
