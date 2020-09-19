<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

class User extends BaseModel
{
    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("country")
     */
    private $country;

    /**
     * @var string|null
     * @SerializedName("avatar")
     */
    private $avatar;

    /**
     * @var int
     * @SerializedName("twofa_enabled")
     */
    private $twofaEnabled;

    /**
     * @var int
     * @SerializedName("confirmed")
     */
    private $confirmed;

    /**
     * @var string|null
     * @SerializedName("language_code")
     */
    private $languageCode;

    /**
     * @var int|null
     * @SerializedName("organisation_id")
     */
    private $organisationId;

    /**
     * @var string|null
     * @SerializedName("timezone")
     */
    private $timezone;

    /**
     * @var int|null
     * @SerializedName("organisation_notifications")
     */
    private $organisationNotifications;

    /**
     * @var string|null
     * @SerializedName("twitter_handle")
     */
    private $twitterHandle;

    /**
     * @var string|null
     * @SerializedName("lastname")
     */
    private $lastname;

    /**
     * @var int|null
     * @SerializedName("brand_id")
     */
    private $brandId;

    /**
     * @var int
     * @SerializedName("active")
     */
    private $active;

    /**
     * @var string|null
     * @SerializedName("email")
     */
    private $email;

    /**
     * @var int|null
     * @SerializedName("template_mode")
     */
    private $templateMode;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var string|null
     * @SerializedName("notes")
     */
    private $notes;

    /**
     * @var int|null
     * @SerializedName("organisation_access_level")
     */
    private $organisationAccessLevel;

    /**
     * @var int|null
     * @SerializedName("facebook_id")
     */
    private $facebookId;

    /**
     * @var int|null
     * @SerializedName("last_active_at")
     */
    private $lastActiveAt;

    /**
     * @var string|null
     * @SerializedName("twofa_token")
     */
    private $twofaToken;

    /**
     * @var string|null
     * @SerializedName("firstname")
     */
    private $firstname;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var int|null
     * @SerializedName("twitter_id")
     */
    private $twitterId;

    /**
     * @var string|null
     * @SerializedName("twofa_secret")
     */
    private $twofaSecret;

    /**
     * @var int
     * @SerializedName("role")
     */
    private $role;

    /**
     * @var string|null
     * @SerializedName("formatted_name")
     */
    private $formattedName;

    /**
     * @var string|null
     * @SerializedName("avatar_url")
     */
    private $avatarUrl;

    /**
     * @return string|null
     */
    public function getTwofaToken(): ?string
    {
        return $this->twofaToken;
    }

    /**
     * @param string|null $twofaToken
     * @return self
     */
    public function setTwofaToken(?string $twofaToken): self
    {
        $this->twofaToken = $twofaToken;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTemplateMode(): ?int
    {
        return $this->templateMode;
    }

    /**
     * @param int|null $templateMode
     * @return self
     */
    public function setTemplateMode(?int $templateMode): self
    {
        $this->templateMode = $templateMode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getActive(): int
    {
        return $this->active;
    }

    /**
     * @param int $active
     * @return self
     */
    public function setActive(int $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param string|null $timezone
     * @return self
     */
    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastActiveAt(): ?int
    {
        return $this->lastActiveAt;
    }

    /**
     * @param int|null $lastActiveAt
     * @return self
     */
    public function setLastActiveAt(?int $lastActiveAt): self
    {
        $this->lastActiveAt = $lastActiveAt;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrganisationId(): ?int
    {
        return $this->organisationId;
    }

    /**
     * @param int|null $organisationId
     * @return self
     */
    public function setOrganisationId(?int $organisationId): self
    {
        $this->organisationId = $organisationId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTwitterId(): ?int
    {
        return $this->twitterId;
    }

    /**
     * @param int|null $twitterId
     * @return self
     */
    public function setTwitterId(?int $twitterId): self
    {
        $this->twitterId = $twitterId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     * @return self
     */
    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param string|null $languageCode
     * @return self
     */
    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     * @return self
     */
    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return self
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     * @return self
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param string|null $avatar
     * @return self
     */
    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFacebookId(): ?int
    {
        return $this->facebookId;
    }

    /**
     * @param int|null $facebookId
     * @return self
     */
    public function setFacebookId(?int $facebookId): self
    {
        $this->facebookId = $facebookId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrganisationAccessLevel(): ?int
    {
        return $this->organisationAccessLevel;
    }

    /**
     * @param int|null $organisationAccessLevel
     * @return self
     */
    public function setOrganisationAccessLevel(?int $organisationAccessLevel): self
    {
        $this->organisationAccessLevel = $organisationAccessLevel;
        return $this;
    }

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param int $role
     * @return self
     */
    public function setRole(int $role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTwofaSecret(): ?string
    {
        return $this->twofaSecret;
    }

    /**
     * @param string|null $twofaSecret
     * @return self
     */
    public function setTwofaSecret(?string $twofaSecret): self
    {
        $this->twofaSecret = $twofaSecret;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTwitterHandle(): ?string
    {
        return $this->twitterHandle;
    }

    /**
     * @param string|null $twitterHandle
     * @return self
     */
    public function setTwitterHandle(?string $twitterHandle): self
    {
        $this->twitterHandle = $twitterHandle;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    /**
     * @param int|null $brandId
     * @return self
     */
    public function setBrandId(?int $brandId): self
    {
        $this->brandId = $brandId;
        return $this;
    }

    /**
     * @return int
     */
    public function getConfirmed(): int
    {
        return $this->confirmed;
    }

    /**
     * @param int $confirmed
     * @return self
     */
    public function setConfirmed(int $confirmed): self
    {
        $this->confirmed = $confirmed;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrganisationNotifications(): ?int
    {
        return $this->organisationNotifications;
    }

    /**
     * @param int|null $organisationNotifications
     * @return self
     */
    public function setOrganisationNotifications(?int $organisationNotifications): self
    {
        $this->organisationNotifications = $organisationNotifications;
        return $this;
    }

    /**
     * @return int
     */
    public function getTwofaEnabled(): int
    {
        return $this->twofaEnabled;
    }

    /**
     * @param int $twofaEnabled
     * @return self
     */
    public function setTwofaEnabled(int $twofaEnabled): self
    {
        $this->twofaEnabled = $twofaEnabled;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return self
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormattedName(): ?string
    {
        return $this->formattedName;
    }

    /**
     * @param string $formattedName
     * @return self
     */
    public function setFormattedName(string $formattedName): self
    {
        $this->formattedName = $formattedName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    /**
     * @param string $avatarUrl
     * @return self
     */
    public function setAvatarUrl(string $avatarUrl): self
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }
    
    protected function getRequiredFields(): array
    {
        return [];
    }
}
