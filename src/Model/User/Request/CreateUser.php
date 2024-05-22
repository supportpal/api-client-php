<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use SupportPal\ApiClient\Model\Model;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateUser extends Model
{
    public const REQUIRED_FIELDS = ['email'];

    #[SerializedName('brand_id')]
    protected int|null $brandId;

    #[SerializedName('firstname')]
    protected string|null $firstname;

    #[SerializedName('lastname')]
    protected string|null $lastname;

    #[SerializedName('email')]
    protected string $email;

    #[SerializedName('password')]
    protected string|null $password;

    #[SerializedName('country')]
    protected string|null $country;

    #[SerializedName('language_code')]
    protected string|null $languageCode;

    #[SerializedName('timezone')]
    protected string|null $timezone;

    #[SerializedName('confirmed')]
    protected bool|null $confirmed;

    #[SerializedName('active')]
    protected int|null $active;

    #[SerializedName('organisation')]
    protected string|null $organisation;

    #[SerializedName('organisation_id')]
    protected int|null $organisationId;

    #[SerializedName('organisation_access_level')]
    protected int|null $organisationAccessLevel;

    #[SerializedName('organisation_notifications')]
    protected int|null $organisationNotifications;

    /** @var int[]|null */
    #[SerializedName('customfield')]
    protected array|null $customfield;

    /** @var int[]|null */
    #[SerializedName('groups')]
    protected array|null $groups;

    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function getOrganisation(): ?string
    {
        return $this->organisation;
    }

    public function getOrganisationId(): ?int
    {
        return $this->organisationId;
    }

    public function getOrganisationAccessLevel(): ?int
    {
        return $this->organisationAccessLevel;
    }

    public function getOrganisationNotifications(): ?int
    {
        return $this->organisationNotifications;
    }

    /**
     * @return int[]|null
     */
    public function getCustomfield(): ?array
    {
        return $this->customfield;
    }

    /**
     * @return int[]|null
     */
    public function getGroups(): ?array
    {
        return $this->groups;
    }
}
