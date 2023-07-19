<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class GroupTranslation extends BaseTranslation
{
    /**
     * @var int
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var int
     * @SerializedName("user_group_id")
     */
    private $userGroupId;

    /**
     * @var string|null
     * @SerializedName("name")
     */
    private $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return GroupTranslation
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserGroupId(): int
    {
        return $this->userGroupId;
    }

    /**
     * @param int $userGroupId
     * @return self
     */
    public function setUserGroupId(int $userGroupId): self
    {
        $this->userGroupId = $userGroupId;

        return $this;
    }
}
