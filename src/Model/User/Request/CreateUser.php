<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateUser extends BaseModel
{
    public const REQUIRED_FIELDS = ['email'];

    #[SerializedName('brand_id')]
    private int|null $brandId;

    #[SerializedName('firstname')]
    private string|null $firstname;

    #[SerializedName('lastname')]
    private string|null $lastname;

    #[SerializedName('email')]
    private string $email;

    #[SerializedName('password')]
    private string|null $password;

    #[SerializedName('country')]
    private string|null $country;

    #[SerializedName('language_code')]
    private string|null $languageCode;

    #[SerializedName('timezone')]
    private string|null $timezone;

    #[SerializedName('confirmed')]
    private bool|null $confirmed;

    #[SerializedName('active')]
    private int|null $active;

    #[SerializedName('organisation')]
    private string|null $organisation;

    #[SerializedName('organisation_id')]
    private int|null $organisationId;

    #[SerializedName('organisation_access_level')]
    private int|null $organisationAccessLevel;

    #[SerializedName('organisation_notifications')]
    private int|null $organisationNotifications;

    /** @var int[]|null */
    #[SerializedName('customfield')]
    private array|null $customfield;

    /** @var int[]|null */
    #[SerializedName('groups')]
    private array|null $groups;

    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    public function setBrandId(?int $brandId): self
    {
        $this->brandId = $brandId;

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

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

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;

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

    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function setConfirmed(?bool $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(?int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getOrganisation(): ?string
    {
        return $this->organisation;
    }

    public function setOrganisation(?string $organisation): self
    {
        $this->organisation = $organisation;

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

    public function getOrganisationAccessLevel(): ?int
    {
        return $this->organisationAccessLevel;
    }

    public function setOrganisationAccessLevel(?int $organisationAccessLevel): self
    {
        $this->organisationAccessLevel = $organisationAccessLevel;

        return $this;
    }

    public function getOrganisationNotifications(): ?int
    {
        return $this->organisationNotifications;
    }

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
     */
    public function setGroups(?array $groups): self
    {
        $this->groups = $groups;

        return $this;
    }
}
