<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateUser extends BaseModel
{
    public const REQUIRED_FIELDS = ['email'];

    /**
     * @var int|null
     * @SerializedName("brand_id")
     */
    private $brandId;

    /**
     * @var string|null
     * @SerializedName("firstname")
     */
    private $firstname;

    /**
     * @var string|null
     * @SerializedName("lastname")
     */
    private $lastname;

    /**
     * @var string
     * @SerializedName("email")
     */
    private $email;

    /**
     * @var string|null
     * @SerializedName("password")
     */
    private $password;

    /**
     * @var string|null
     * @SerializedName("country")
     */
    private $country;

    /**
     * @var string|null
     * @SerializedName("language_code")
     */
    private $languageCode;

    /**
     * @var string|null
     * @SerializedName("timezone")
     */
    private $timezone;

    /**
     * @var bool|null
     * @SerializedName("confirmed")
     */
    private $confirmed;

    /**
     * @var int|null
     * @SerializedName("active")
     */
    private $active;

    /**
     * @var string|null
     * @SerializedName("organisation")
     */
    private $organisation;

    /**
     * @var int|null
     * @SerializedName("organisation_id")
     */
    private $organisationId;

    /**
     * @var int|null
     * @SerializedName("organisation_access_level")
     */
    private $organisationAccessLevel;

    /**
     * @var int|null
     * @SerializedName("organisation_notifications")
     */
    private $organisationNotifications;

    /**
     * @var int[]|null
     * @SerializedName("customfield")
     */
    private $customfield;

    /**
     * @var int[]|null
     * @SerializedName("groups")
     */
    private $groups;

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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return self
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

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
     * @return bool|null
     */
    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    /**
     * @param bool|null $confirmed
     * @return self
     */
    public function setConfirmed(?bool $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getActive(): ?int
    {
        return $this->active;
    }

    /**
     * @param int|null $active
     * @return self
     */
    public function setActive(?int $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrganisation(): ?string
    {
        return $this->organisation;
    }

    /**
     * @param string|null $organisation
     * @return self
     */
    public function setOrganisation(?string $organisation): self
    {
        $this->organisation = $organisation;

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
     * @return int[]|null
     */
    public function getCustomfield(): ?array
    {
        return $this->customfield;
    }

    /**
     * @param int[]|null $customfield
     * @return self
     */
    public function setCustomfield(?array $customfield): self
    {
        $this->customfield = $customfield;

        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getGroups(): ?array
    {
        return $this->groups;
    }

    /**
     * @param int[]|null $groups
     * @return self
     */
    public function setGroups(?array $groups): self
    {
        $this->groups = $groups;

        return $this;
    }
}
