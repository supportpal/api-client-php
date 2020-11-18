<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class SlaPlanTranslation extends BaseTranslation
{
    /**
     * @var int
     * @SerializedName("sla_plan_id")
     */
    private $slaPlanId;

    /**
     * @var string|null
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var string|null
     * @SerializedName("description")
     */
    private $description;

    /**
     * @return int
     */
    public function getSlaPlanId(): int
    {
        return $this->slaPlanId;
    }

    /**
     * @param int $slaPlanId
     * @return self
     */
    public function setSlaPlanId(int $slaPlanId): self
    {
        $this->slaPlanId = $slaPlanId;

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
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
