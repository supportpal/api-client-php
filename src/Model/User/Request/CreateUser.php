<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateUser extends BaseModel
{
    public const REQUIRED_FIELDS = ['email'];

    public function __construct(
        #[SerializedName('brand_id')]
        public readonly int|null $brandId,

        #[SerializedName('firstname')]
        public readonly string|null $firstname,

        #[SerializedName('lastname')]
        public readonly string|null $lastname,

        #[SerializedName('email')]
        public readonly string $email,

        #[SerializedName('password')]
        public readonly string|null $password,

        #[SerializedName('country')]
        public readonly string|null $country,

        #[SerializedName('language_code')]
        public readonly string|null $languageCode,

        #[SerializedName('timezone')]
        public readonly string|null $timezone,

        #[SerializedName('confirmed')]
        public readonly bool|null $confirmed,

        #[SerializedName('active')]
        public readonly int|null $active,

        #[SerializedName('organisation')]
        public readonly string|null $organisation,

        #[SerializedName('organisation_id')]
        public readonly int|null $organisationId,

        #[SerializedName('organisation_access_level')]
        public readonly int|null $organisationAccessLevel,

        #[SerializedName('organisation_notifications')]
        public readonly int|null $organisationNotifications,

        /** @var int[]|null */
        #[SerializedName('customfield')]
        public readonly array|null $customfield,

        /** @var int[]|null */
        #[SerializedName('groups')]
        public readonly array|null $groups,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
