<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class User extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('country')]
    protected string|null $country;

    #[SerializedName('avatar')]
    protected string|null $avatar;

    #[SerializedName('twofa_enabled')]
    protected bool|null $twofaEnabled;

    /** @deprecated Use email_verified */
    #[SerializedName('confirmed')]
    protected ?bool $confirmed = null;

    #[SerializedName('email_verified')]
    protected bool|null $emailVerified;

    #[SerializedName('language_code')]
    protected string|null $languageCode;

    #[SerializedName('organisation_id')]
    protected int|null $organisationId;

    #[SerializedName('timezone')]
    protected string|null $timezone;

    #[SerializedName('organisation_notifications')]
    protected bool|null $organisationNotifications;

    #[SerializedName('twitter_handle')]
    protected string|null $twitterHandle;

    #[SerializedName('lastname')]
    protected string|null $lastname;

    #[SerializedName('brand_id')]
    protected int|null $brandId;

    #[SerializedName('active')]
    protected bool $active;

    #[SerializedName('email')]
    protected string|null $email;

    #[SerializedName('template_mode')]
    protected int|null $templateMode;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('notes')]
    protected string|null $notes;

    #[SerializedName('organisation_access_level')]
    protected int|null $organisationAccessLevel;

    #[SerializedName('facebook_id')]
    protected int|null $facebookId;

    #[SerializedName('last_active_at')]
    protected int|null $lastActiveAt;

    #[SerializedName('twofa_token')]
    protected string|null $twofaToken;

    #[SerializedName('firstname')]
    protected string|null $firstname;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('twitter_id')]
    protected int|null $twitterId = null;

    #[SerializedName('twofa_secret')]
    protected string|null $twofaSecret;

    #[SerializedName('role')]
    protected int $role;

    #[SerializedName('formatted_name')]
    protected string|null $formattedName = null;

    #[SerializedName('avatar_url')]
    protected string|null $avatarUrl = null;

    #[SerializedName('organisation')]
    protected Organisation|null $organisation = null;

    /** @var UserCustomField[]|null */
    #[SerializedName('customfields')]
    protected array|null $customfields = null;

    /** @var Group[]|null */
    #[SerializedName('groups')]
    protected array|null $groups = null;

    public function getTwofaToken(): ?string
    {
        return $this->twofaToken;
    }

    public function getTemplateMode(): ?int
    {
        return $this->templateMode;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function getLastActiveAt(): ?int
    {
        return $this->lastActiveAt;
    }

    public function getOrganisationId(): ?int
    {
        return $this->organisationId;
    }

    public function getTwitterId(): ?int
    {
        return $this->twitterId;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function getFacebookId(): ?int
    {
        return $this->facebookId;
    }

    public function getOrganisationAccessLevel(): ?int
    {
        return $this->organisationAccessLevel;
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function getTwofaSecret(): ?string
    {
        return $this->twofaSecret;
    }

    public function getTwitterHandle(): ?string
    {
        return $this->twitterHandle;
    }

    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    /**
     * @deprecated Use getEmailVerified
     */
    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function getEmailVerified(): ?bool
    {
        return $this->emailVerified;
    }

    public function getOrganisationNotifications(): ?bool
    {
        return $this->organisationNotifications;
    }

    public function getTwofaEnabled(): ?bool
    {
        return $this->twofaEnabled;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getFormattedName(): ?string
    {
        return $this->formattedName;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    /**
     * @return UserCustomField[]|null
     */
    public function getCustomfields(): ?array
    {
        return $this->customfields;
    }

    /**
     * @return Group[]|null
     */
    public function getGroups(): ?array
    {
        return $this->groups;
    }
}
