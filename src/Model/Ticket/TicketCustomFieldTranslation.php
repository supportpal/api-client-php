<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Attribute\SerializedName;

class TicketCustomFieldTranslation extends BaseTranslation
{
    public function __construct(
        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('ticket_custom_field_id')]
        public readonly int $ticketCustomFieldId,

        #[SerializedName('description')]
        public readonly string|null $description,

        #[SerializedName('regex_error_message')]
        public readonly string|null $regexErrorMessage,

        $locale,
        $pivot = null,
    ) {
        parent::__construct($locale, $pivot);
    }
}
