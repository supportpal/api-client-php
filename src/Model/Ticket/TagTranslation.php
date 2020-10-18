<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class TagTranslation extends BaseTranslation
{
    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("tag_id")
     */
    private $tagId;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getTagId(): int
    {
        return $this->tagId;
    }

    /**
     * @param int $tagId
     * @return self
     */
    public function setTagId(int $tagId): self
    {
        $this->tagId = $tagId;

        return $this;
    }
}
