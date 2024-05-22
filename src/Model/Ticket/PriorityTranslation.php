<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class PriorityTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('priority_id')]
    protected int $priorityId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPriorityId(): int
    {
        return $this->priorityId;
    }
}
