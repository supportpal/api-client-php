<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\User\User;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Message extends BaseModel
{
    public function __construct(
        #[SerializedName('user_id')]
        public readonly int|null $userId = null,
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('created_at')]
        public readonly int|null $createdAt,
        #[SerializedName('purified_text')]
        public readonly string|null $purifiedText,
        #[SerializedName('social_id')]
        public readonly string|null $socialId,
        #[SerializedName('ticket_id')]
        public readonly int $ticketId,
        #[SerializedName('text')]
        public readonly string $text,
        #[SerializedName('channel_id')]
        public readonly int|null $channelId = null,
        #[SerializedName('user_ip_address')]
        public readonly string|null $userIpAddress = null,
        #[SerializedName('by')]
        public readonly int|null $by = null,
        #[SerializedName('excerpt')]
        public readonly string|null $excerpt = null,
        #[SerializedName('type')]
        public readonly int|null $type = null,
        #[SerializedName('extra')]
        public readonly Extra|null $extra = null,
        #[SerializedName('user_name')]
        public readonly string|null $userName = null,
        #[SerializedName('updated_at')]
        public readonly int|null $updatedAt = null,
        #[SerializedName('is_draft')]
        public readonly bool|null $isDraft = null,
        /** @var Attachment[]|null */
        #[SerializedName('attachments')]
        public readonly array|null $attachments = null,
        public readonly ?User $user = null,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
