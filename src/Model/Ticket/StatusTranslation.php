<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class StatusTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('status_id')]
    protected int $statusId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatusId(): int
    {
        return $this->statusId;
    }
}
