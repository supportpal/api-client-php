<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Shared\CustomField;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TicketCustomField extends CustomField
{
    public function __construct(
        $dependsOnFieldId,
        $regex,
        $locked,
        $updatedAt,
        $createdAt,
        $dependsOnOptionId,
        $id,
        $name,
        $required,
        $public,
        $order,
        $description,
        $type,
        $encrypted,
        $options,
        $brands,

        #[SerializedName('purge')]
        public readonly int|null $purge = null,

        /** @var Department[]|null */
        #[SerializedName('departments')]
        public readonly array|null $departments = null,

        #[SerializedName('ticket_id')]
        public readonly int|null $ticketId = null,

        /** @var TicketCustomFieldTranslation[]|null */
        #[SerializedName('translations')]
        public readonly array|null $translations = null,

        $pivot = null,
    ) {
        parent::__construct($dependsOnFieldId, $regex, $locked, $updatedAt, $createdAt, $dependsOnOptionId, $id, $name, $required, $public, $order, $description, $type, $encrypted, $options, $brands, $pivot);
    }
}
