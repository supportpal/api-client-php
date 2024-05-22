<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Organisation extends BaseModel
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('notes')]
    protected string|null $notes;

    #[SerializedName('brand_id')]
    protected int $brandId;

    #[SerializedName('language_code')]
    protected string|null $languageCode;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('timezone')]
    protected string|null $timezone;

    #[SerializedName('country')]
    protected string|null $country;

    #[SerializedName('owner_id')]
    protected int|null $ownerId;

    /** @var User[]|null */
    #[SerializedName('users')]
    protected array|null $users;

    /** @var UserCustomField[]|null */
    #[SerializedName('customfields')]
    protected array|null $customfields;

    /** @var Domain[]|null */
    #[SerializedName('domains')]
    protected array|null $domains;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    /**
     * @return User[]|null
     */
    public function getUsers(): ?array
    {
        return $this->users;
    }

    /**
     * @return UserCustomField[]|null
     */
    public function getCustomfields(): ?array
    {
        return $this->customfields;
    }

    /**
     * @return Domain[]|null
     */
    public function getDomains(): ?array
    {
        return $this->domains;
    }
}
