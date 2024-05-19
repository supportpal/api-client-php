<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Organisation extends BaseModel
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('notes')]
    private string|null $notes;

    #[SerializedName('brand_id')]
    private int $brandId;

    #[SerializedName('language_code')]
    private string|null $languageCode;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('timezone')]
    private string|null $timezone;

    #[SerializedName('country')]
    private string|null $country;

    #[SerializedName('owner_id')]
    private int|null $ownerId;

    /** @var User[]|null */
    #[SerializedName('users')]
    private array|null $users;

    /** @var UserCustomField[]|null */
    #[SerializedName('customfields')]
    private array|null $customfields;

    /** @var Domain[]|null */
    #[SerializedName('domains')]
    private array|null $domains;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Organisation
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Organisation
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): Organisation
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): Organisation
    {
        $this->notes = $notes;

        return $this;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function setBrandId(int $brandId): Organisation
    {
        $this->brandId = $brandId;

        return $this;
    }

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function setLanguageCode(?string $languageCode): Organisation
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): Organisation
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): Organisation
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): Organisation
    {
        $this->country = $country;

        return $this;
    }

    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    public function setOwnerId(?int $ownerId): Organisation
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getUsers(): ?array
    {
        return $this->users;
    }

    /**
     * @param User[]|null $users
     */
    public function setUsers(?array $users): Organisation
    {
        $this->users = $users;

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
    public function setCustomfields(?array $customfields): Organisation
    {
        $this->customfields = $customfields;

        return $this;
    }

    /**
     * @return Domain[]|null
     */
    public function getDomains(): ?array
    {
        return $this->domains;
    }

    /**
     * @param Domain[]|null $domains
     */
    public function setDomains(?array $domains): Organisation
    {
        $this->domains = $domains;

        return $this;
    }
}
