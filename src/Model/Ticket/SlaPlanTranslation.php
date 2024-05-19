<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class SlaPlanTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('sla_plan_id')]
    private int $slaPlanId;

    #[SerializedName('name')]
    private string|null $name;

    #[SerializedName('description')]
    private string|null $description;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getSlaPlanId(): int
    {
        return $this->slaPlanId;
    }

    public function setSlaPlanId(int $slaPlanId): self
    {
        $this->slaPlanId = $slaPlanId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
