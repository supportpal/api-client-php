<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Shared\CustomField;
use Symfony\Component\Serializer\Annotation\SerializedName;

class TicketCustomField extends CustomField
{
    /**
     * @var int
     * @SerializedName("purge")
     */
    private $purge;

    /**
     * @var Department[]
     * @SerializedName("departments")
     */
    private $departments;

    /**
     * @var int|null
     * @SerializedName("ticket_id")
     */
    private $ticketId;

    /**
     * @var TicketCustomFieldTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

    /**
     * @return int
     */
    public function getPurge(): int
    {
        return $this->purge;
    }

    /**
     * @param int $purge
     * @return self
     */
    public function setPurge(int $purge): self
    {
        $this->purge = $purge;

        return $this;
    }

    /**
     * @return Department[]
     */
    public function getDepartments(): array
    {
        return $this->departments;
    }

    /**
     * @param Department[] $departments
     * @return self
     */
    public function setDepartments(array $departments): self
    {
        $this->departments = $departments;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTicketId(): ?int
    {
        return $this->ticketId;
    }

    /**
     * @param int|null $ticketId
     * @return TicketCustomField
     */
    public function setTicketId(?int $ticketId): self
    {
        $this->ticketId = $ticketId;

        return $this;
    }

    /**
     * @return TicketCustomFieldTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param TicketCustomFieldTranslation[]|null $translations
     * @return self
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
