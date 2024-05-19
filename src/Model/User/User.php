<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class User extends BaseModel
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('country')]
    private string|null $country;

    #[SerializedName('avatar')]
    private string|null $avatar;

    #[SerializedName('twofa_enabled')]
    private bool|null $twofaEnabled;

    /** @deprecated Use email_verified */
    #[SerializedName('confirmed')]
    private ?bool $confirmed;

    #[SerializedName('email_verified')]
    private bool|null $emailVerified;

    #[SerializedName('language_code')]
    private string|null $languageCode;

    #[SerializedName('organisation_id')]
    private int|null $organisationId;

    #[SerializedName('timezone')]
    private string|null $timezone;

    #[SerializedName('organisation_notifications')]
    private bool|null $organisationNotifications;

    #[SerializedName('twitter_handle')]
    private string|null $twitterHandle;

    #[SerializedName('lastname')]
    private string|null $lastname;

    #[SerializedName('brand_id')]
    private int|null $brandId;

    #[SerializedName('active')]
    private bool $active;

    #[SerializedName('email')]
    private string|null $email;

    #[SerializedName('template_mode')]
    private int|null $templateMode;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('notes')]
    private string|null $notes;

    #[SerializedName('organisation_access_level')]
    private int|null $organisationAccessLevel;

    #[SerializedName('facebook_id')]
    private int|null $facebookId;

    #[SerializedName('last_active_at')]
    private int|null $lastActiveAt;

    #[SerializedName('twofa_token')]
    private string|null $twofaToken;

    #[SerializedName('firstname')]
    private string|null $firstname;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('twitter_id')]
    private int|null $twitterId;

    #[SerializedName('twofa_secret')]
    private string|null $twofaSecret;

    #[SerializedName('role')]
    private int $role;

    #[SerializedName('formatted_name')]
    private string|null $formattedName;

    #[SerializedName('avatar_url')]
    private string|null $avatarUrl;

    #[SerializedName('organisation')]
    private Organisation|null $organisation;

    /** @var UserCustomField[]|null */
    #[SerializedName('customfields')]
    private array|null $customfields;

    /** @var Group[]|null */
    #[SerializedName('groups')]
    private array|null $groups;

    public function getTwofaToken(): ?string
    {
        return $this->twofaToken;
    }

    public function setTwofaToken(?string $twofaToken): self
    {
        $this->twofaToken = $twofaToken;

        return $this;
    }

    public function getTemplateMode(): ?int
    {
        return $this->templateMode;
    }

    public function setTemplateMode(?int $templateMode): self
    {
        $this->templateMode = $templateMode;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getLastActiveAt(): ?int
    {
        return $this->lastActiveAt;
    }

    public function setLastActiveAt(?int $lastActiveAt): self
    {
        $this->lastActiveAt = $lastActiveAt;

        return $this;
    }

    public function getOrganisationId(): ?int
    {
        return $this->organisationId;
    }

    public function setOrganisationId(?int $organisationId): self
    {
        $this->organisationId = $organisationId;

        return $this;
    }

    public function getTwitterId(): ?int
    {
        return $this->twitterId;
    }

    public function setTwitterId(?int $twitterId): self
    {
        $this->twitterId = $twitterId;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getFacebookId(): ?int
    {
        return $this->facebookId;
    }

    public function setFacebookId(?int $facebookId): self
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    public function getOrganisationAccessLevel(): ?int
    {
        return $this->organisationAccessLevel;
    }

    public function setOrganisationAccessLevel(?int $organisationAccessLevel): self
    {
        $this->organisationAccessLevel = $organisationAccessLevel;

        return $this;
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getTwofaSecret(): ?string
    {
        return $this->twofaSecret;
    }

    public function setTwofaSecret(?string $twofaSecret): self
    {
        $this->twofaSecret = $twofaSecret;

        return $this;
    }

    public function getTwitterHandle(): ?string
    {
        return $this->twitterHandle;
    }

    public function setTwitterHandle(?string $twitterHandle): self
    {
        $this->twitterHandle = $twitterHandle;

        return $this;
    }

    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    public function setBrandId(?int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @deprecated Use getEmailVerified
     */
    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    /**
     * @param bool $confirmed
     *@deprecated Use getEmailVerified
     */
    public function setConfirmed(bool $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    public function getEmailVerified(): ?bool
    {
        return $this->emailVerified;
    }

    public function setEmailVerified(bool $verified): self
    {
        $this->emailVerified = $verified;

        return $this;
    }

    public function getOrganisationNotifications(): ?bool
    {
        return $this->organisationNotifications;
    }

    public function setOrganisationNotifications(?bool $organisationNotifications): self
    {
        $this->organisationNotifications = $organisationNotifications;

        return $this;
    }

    public function getTwofaEnabled(): ?bool
    {
        return $this->twofaEnabled;
    }

    public function setTwofaEnabled(?bool $twofaEnabled): self
    {
        $this->twofaEnabled = $twofaEnabled;

        return $this;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getFormattedName(): ?string
    {
        return $this->formattedName;
    }

    public function setFormattedName(string $formattedName): self
    {
        $this->formattedName = $formattedName;

        return $this;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(string $avatarUrl): self
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    public function getOrganisation(): ?Organisation
    {
        return $this->organisation;
    }

    public function setOrganisation(?Organisation $organisation): User
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * @return UserCustomField[]|null
     */
    public function getCustomfields(): ?array
    {
        return $this->customfields;
    }

    /**
     * @param UserCustomField[]|null $customfields
     */
    public function setCustomfields(?array $customfields): User
    {
        $this->customfields = $customfields;

        return $this;
    }

    /**
     * @return Group[]|null
     */
    public function getGroups(): ?array
    {
        return $this->groups;
    }

    /**
     * @param Group[]|null $groups
     */
    public function setGroups(?array $groups): self
    {
        $this->groups = $groups;

        return $this;
    }
}
