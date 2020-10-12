<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Organisation extends BaseModel
{
    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var string|null
     * @SerializedName("notes")
     */
    private $notes;

    /**
     * @var int
     * @SerializedName("brand_id")
     */
    private $brandId;

    /**
     * @var string|null
     * @SerializedName("language_code")
     */
    private $languageCode;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var string|null
     * @SerializedName("timezone")
     */
    private $timezone;

    /**
     * @var string|null
     * @SerializedName("country")
     */
    private $country;

    /**
     * @var int|null
     * @SerializedName("owner_id")
     */
    private $ownerId;

    /**
     * @var User[]|null
     * @SerializedName("users")
     */
    private $users;

    /**
     * @var UserCustomField[]|null
     * @SerializedName("customfields")
     */
    private $customfields;

    /**
     * @var Domain[]|null
     * @SerializedName("domains")
     */
    private $domains;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Organisation
     */
    public function setId(?int $id): Organisation
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Organisation
     */
    public function setName(string $name): Organisation
    {
        $this->name = $name;

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
     * @return Organisation
     */
    public function setCreatedAt(int $createdAt): Organisation
    {
        $this->createdAt = $createdAt;

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
     * @return Organisation
     */
    public function setNotes(?string $notes): Organisation
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     * @return Organisation
     */
    public function setBrandId(int $brandId): Organisation
    {
        $this->brandId = $brandId;

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
     * @return Organisation
     */
    public function setLanguageCode(?string $languageCode): Organisation
    {
        $this->languageCode = $languageCode;

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
     * @return Organisation
     */
    public function setUpdatedAt(int $updatedAt): Organisation
    {
        $this->updatedAt = $updatedAt;

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
     * @return Organisation
     */
    public function setTimezone(?string $timezone): Organisation
    {
        $this->timezone = $timezone;

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
     * @return Organisation
     */
    public function setCountry(?string $country): Organisation
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    /**
     * @param int|null $ownerId
     * @return Organisation
     */
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
     * @return Organisation
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
     * @return Organisation
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
     * @return Organisation
     */
    public function setDomains(?array $domains): Organisation
    {
        $this->domains = $domains;

        return $this;
    }
}
