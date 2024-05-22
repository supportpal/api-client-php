<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class GroupTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('description')]
    protected string|null $description;

    #[SerializedName('user_group_id')]
    protected int $userGroupId;

    #[SerializedName('name')]
    protected string|null $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getUserGroupId(): int
    {
        return $this->userGroupId;
    }
}
