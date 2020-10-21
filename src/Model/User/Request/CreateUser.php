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
     * @var int|null
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
     * @var array|null
     * @SerializedName("customfield")
     */
    private $customfield;

    /**
     * @var array|null
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
     * @return CreateUser
     */
    public function setBrandId(?int $brandId): CreateUser
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
     * @return CreateUser
     */
    public function setFirstname(?string $firstname): CreateUser
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
     * @return CreateUser
     */
    public function setLastname(?string $lastname): CreateUser
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
     * @return CreateUser
     */
    public function setEmail(string $email): CreateUser
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
     * @return CreateUser
     */
    public function setPassword(?string $password): CreateUser
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
     * @return CreateUser
     */
    public function setCountry(?string $country): CreateUser
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
     * @return CreateUser
     */
    public function setLanguageCode(?string $languageCode): CreateUser
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
     * @return CreateUser
     */
    public function setTimezone(?string $timezone): CreateUser
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getConfirmed(): ?int
    {
        return $this->confirmed;
    }

    /**
     * @param int|null $confirmed
     * @return CreateUser
     */
    public function setConfirmed(?int $confirmed): CreateUser
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
     * @return CreateUser
     */
    public function setActive(?int $active): CreateUser
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
     * @return CreateUser
     */
    public function setOrganisation(?string $organisation): CreateUser
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
     * @return CreateUser
     */
    public function setOrganisationId(?int $organisationId): CreateUser
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
     * @return CreateUser
     */
    public function setOrganisationAccessLevel(?int $organisationAccessLevel): CreateUser
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
     * @return CreateUser
     */
    public function setOrganisationNotifications(?int $organisationNotifications): CreateUser
    {
        $this->organisationNotifications = $organisationNotifications;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCustomfield(): ?array
    {
        return $this->customfield;
    }

    /**
     * @param array|null $customfield
     * @return CreateUser
     */
    public function setCustomfield(?array $customfield): CreateUser
    {
        $this->customfield = $customfield;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getGroups(): ?array
    {
        return $this->groups;
    }

    /**
     * @param array|null $groups
     * @return CreateUser
     */
    public function setGroups(?array $groups): CreateUser
    {
        $this->groups = $groups;

        return $this;
    }
}
