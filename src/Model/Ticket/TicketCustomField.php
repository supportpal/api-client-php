<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Department\Department;
use SupportPal\ApiClient\Model\Shared\CustomField;
use SupportPal\ApiClient\Model\Shared\Option;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TicketCustomField extends CustomField
{
    public function __construct(
        #[SerializedName('regex_error_message')]
        public readonly string|null $regexErrorMessage,
        #[SerializedName('depends_on_field_id')]
        public readonly int|null $dependsOnFieldId,
        #[SerializedName('regex')]
        public readonly string|null $regex,
        #[SerializedName('locked')]
        public readonly bool $locked,
        #[SerializedName('updated_at')]
        public readonly int|null $updatedAt,
        #[SerializedName('created_at')]
        public readonly int|null $createdAt,
        #[SerializedName('depends_on_option_id')]
        public readonly int|null $dependsOnOptionId,
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('name')]
        public readonly string|null $name,
        #[SerializedName('required')]
        public readonly bool|null $required,
        #[SerializedName('public')]
        public readonly bool|null $public,
        #[SerializedName('order')]
        public readonly int|null $order,
        #[SerializedName('description')]
        public readonly string|null $description,
        #[SerializedName('type')]
        public readonly int|null $type,
        #[SerializedName('encrypted')]
        public readonly int|null $encrypted,
        /** @var Option[]|null */
        public readonly ?array $options,
        /** @var Brand[]|null */
        public readonly ?array $brands,
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
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($dependsOnFieldId, $regex, $locked, $updatedAt, $createdAt, $dependsOnOptionId, $id, $name, $required, $public, $order, $description, $type, $encrypted, $options, $brands, $pivot);
    }
}
