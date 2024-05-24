<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateMessage extends BaseModel
{
    public function __construct(
        #[SerializedName('ticket_id')]
        public readonly int $ticketId,
        #[SerializedName('user_id')]
        public readonly int $userId,
        #[SerializedName('user_ip_address')]
        public readonly string|null $userIpAddress,
        #[SerializedName('message_type')]
        public readonly int|null $messageType,
        #[SerializedName('text')]
        public readonly string $text,
        /** @var string[]|null */
        #[SerializedName('cc')]
        public readonly array|null $cc,
        #[SerializedName('is_draft')]
        public readonly bool|null $isDraft,
        #[SerializedName('send_user_email')]
        public readonly bool|null $sendUserEmail,
        #[SerializedName('send_operators_email')]
        public readonly bool|null $sendOperatorsEmail,
        /** @var string[]|null */
        #[SerializedName('attachment')]
        public readonly array|null $attachment,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
