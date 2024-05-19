<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class StatusTranslation extends BaseTranslation
{
    #[SerializedName('id')]
    private int $id;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('status_id')]
    private int $statusId;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStatusId(): int
    {
        return $this->statusId;
    }

    public function setStatusId(int $statusId): self
    {
        $this->statusId = $statusId;

        return $this;
    }
}
