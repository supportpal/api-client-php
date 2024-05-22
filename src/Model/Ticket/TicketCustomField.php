<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Shared\CustomField;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TicketCustomField extends CustomField
{
    #[SerializedName('purge')]
    protected int|null $purge = null;

    /** @var Department[]|null */
    #[SerializedName('departments')]
    protected array|null $departments = null;

    #[SerializedName('ticket_id')]
    protected int|null $ticketId = null;

    /** @var TicketCustomFieldTranslation[]|null */
    #[SerializedName('translations')]
    protected array|null $translations = null;

    public function getPurge(): ?int
    {
        return $this->purge;
    }

    /**
     * @return Department[]|null
     */
    public function getDepartments(): ?array
    {
        return $this->departments;
    }

    public function getTicketId(): ?int
    {
        return $this->ticketId;
    }

    /**
     * @return TicketCustomFieldTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }
}
