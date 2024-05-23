<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Organisation extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('notes')]
        public readonly string|null $notes,

        #[SerializedName('brand_id')]
        public readonly int $brandId,

        #[SerializedName('language_code')]
        public readonly string|null $languageCode,

        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        #[SerializedName('timezone')]
        public readonly string|null $timezone,

        #[SerializedName('country')]
        public readonly string|null $country,

        #[SerializedName('owner_id')]
        public readonly int|null $ownerId,

        /** @var User[]|null */
        #[SerializedName('users')]
        public readonly array|null $users,

        /** @var UserCustomField[]|null */
        #[SerializedName('customfields')]
        public readonly array|null $customfields,

        /** @var Domain[]|null */
        #[SerializedName('domains')]
        public readonly array|null $domains,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
