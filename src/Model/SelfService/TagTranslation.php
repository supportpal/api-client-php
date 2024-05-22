<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\SelfService;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TagTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('tag_id')]
    protected int $tagId;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('slug')]
    protected string $slug;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTagId(): int
    {
        return $this->tagId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
