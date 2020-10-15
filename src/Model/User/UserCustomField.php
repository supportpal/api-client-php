<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Shared\CustomField;
use Symfony\Component\Serializer\Annotation\SerializedName;

class UserCustomField extends CustomField
{
    /**
     * @var int|null
     * @SerializedName("user_id")
     */
    private $userId;

    /**
     * @var UserCustomFieldTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     * @return self
     */
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
     * @return self
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
