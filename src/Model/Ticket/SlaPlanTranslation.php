<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class SlaPlanTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('sla_plan_id')]
    protected int $slaPlanId;

    #[SerializedName('name')]
    protected string|null $name;

    #[SerializedName('description')]
    protected string|null $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlaPlanId(): int
    {
        return $this->slaPlanId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
