<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Shared\CustomField;
use Symfony\Component\Serializer\Attribute\SerializedName;

class UserCustomField extends CustomField
{
    #[SerializedName('user_id')]
    private int|null $userId;

    /** @var UserCustomFieldTranslation[]|null */
    #[SerializedName('translations')]
    private array|null $translations;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return UserCustomFieldTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param UserCustomFieldTranslation[]|null $translations
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
