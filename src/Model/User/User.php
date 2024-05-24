<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class User extends BaseModel
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('country')]
        public readonly string|null $country,
        #[SerializedName('avatar')]
        public readonly string|null $avatar,
        #[SerializedName('twofa_enabled')]
        public readonly bool|null $twofaEnabled,
        #[SerializedName('email_verified')]
        public readonly bool|null $emailVerified,
        #[SerializedName('language_code')]
        public readonly string|null $languageCode,
        #[SerializedName('organisation_id')]
        public readonly int|null $organisationId,
        #[SerializedName('timezone')]
        public readonly string|null $timezone,
        #[SerializedName('organisation_notifications')]
        public readonly bool|null $organisationNotifications,
        #[SerializedName('twitter_handle')]
        public readonly string|null $twitterHandle,
        #[SerializedName('lastname')]
        public readonly string|null $lastname,
        #[SerializedName('brand_id')]
        public readonly int|null $brandId,
        #[SerializedName('active')]
        public readonly bool $active,
        #[SerializedName('email')]
        public readonly string|null $email,
        #[SerializedName('template_mode')]
        public readonly int|null $templateMode,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('notes')]
        public readonly string|null $notes,
        #[SerializedName('organisation_access_level')]
        public readonly int|null $organisationAccessLevel,
        #[SerializedName('facebook_id')]
        public readonly int|null $facebookId,
        #[SerializedName('last_active_at')]
        public readonly int|null $lastActiveAt,
        #[SerializedName('twofa_token')]
        public readonly string|null $twofaToken,
        #[SerializedName('firstname')]
        public readonly string|null $firstname,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('twofa_secret')]
        public readonly string|null $twofaSecret,
        #[SerializedName('role')]
        public readonly int $role,
        #[SerializedName('twitter_id')]
        public readonly int|null $twitterId = null,
        #[SerializedName('formatted_name')]
        public readonly string|null $formattedName = null,
        #[SerializedName('avatar_url')]
        public readonly string|null $avatarUrl = null,
        #[SerializedName('organisation')]
        public readonly Organisation|null $organisation = null,
        /** @var UserCustomField[]|null */
        #[SerializedName('customfields')]
        public readonly array|null $customfields = null,
        /** @var Group[]|null */
        #[SerializedName('groups')]
        public readonly array|null $groups = null,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
