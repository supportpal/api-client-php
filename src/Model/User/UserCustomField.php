<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Shared\CustomField;
use Symfony\Component\Serializer\Attribute\SerializedName;

class UserCustomField extends CustomField
{
    #[SerializedName('user_id')]
    protected int|null $userId = null;

    /** @var UserCustomFieldTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @return UserCustomFieldTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
