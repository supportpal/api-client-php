<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Shared\CustomField;
use Symfony\Component\Serializer\Attribute\SerializedName;

class UserCustomField extends CustomField
{
    // todo call parent
    public function __construct(
        $regexErrorMessage,
        $dependsOnFieldId,
        $regex,
        $locked,
        $updatedAt,
        $createdAt,
        $dependsOnOptionId,
        $id,
        $name,
        $required,
        $public,
        $order,
        $description,
        $type,
        $encrypted,
        $options,
        $brands,

        /** @var UserCustomFieldTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations,

        #[SerializedName('user_id')]
        public readonly int|null $userId = null,

        $pivot = null,
    ) {
        parent::__construct($regexErrorMessage, $dependsOnFieldId, $regex, $locked, $updatedAt, $createdAt, $dependsOnOptionId, $id, $name, $required, $public, $order, $description, $type, $encrypted, $options, $brands, $pivot);
    }
}
