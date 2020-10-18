<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class PriorityTranslation extends BaseTranslation
{
    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var int
     * @SerializedName("priority_id")
     */
    private $priorityId;

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
    public function getPriorityId(): int
    {
        return $this->priorityId;
    }

    /**
     * @param int $priorityId
     * @return self
     */
    public function setPriorityId(int $priorityId): self
    {
        $this->priorityId = $priorityId;

        return $this;
    }
}
