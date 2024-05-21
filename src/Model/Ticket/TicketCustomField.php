<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Shared\CustomField;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TicketCustomField extends CustomField
{
    #[SerializedName('purge')]
    private int|null $purge = null;

    /** @var Department[]|null */
    #[SerializedName('departments')]
    private array|null $departments = null;

    #[SerializedName('ticket_id')]
    private int|null $ticketId = null;

    /** @var TicketCustomFieldTranslation[]|null */
    #[SerializedName('translations')]
    private array|null $translations = null;

    public function getPurge(): ?int
    {
        return $this->purge;
    }

    public function setPurge(?int $purge): self
    {
        $this->purge = $purge;

        return $this;
    }

    /**
     * @return Department[]|null
     */
    public function getDepartments(): ?array
    {
        return $this->departments;
    }

    /**
     * @param Department[]|null $departments
     */
    public function setDepartments(?array $departments): self
    {
        $this->departments = $departments;

        return $this;
    }

    public function getTicketId(): ?int
    {
        return $this->ticketId;
    }

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
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
