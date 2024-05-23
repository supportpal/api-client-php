<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class GroupTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public int $id,

        #[SerializedName('description')]
        public readonly string|null $description,

        #[SerializedName('user_group_id')]
        public readonly int $userGroupId,

        #[SerializedName('name')]
        public readonly string|null $name,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
