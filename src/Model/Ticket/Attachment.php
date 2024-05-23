<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Upload;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Attachment extends BaseModel
{
    public function __construct(
        #[SerializedName('original_name')]
        public readonly string $originalName,

        #[SerializedName('upload_hash')]
        public readonly string $uploadHash,

        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('ticket_id')]
        public readonly int $ticketId,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        #[SerializedName('message_id')]
        public readonly int $messageId,

        #[SerializedName('operator_url')]
        public readonly string $operatorUrl,

        #[SerializedName('frontend_url')]
        public readonly string $frontendUrl,

        #[SerializedName('direct_operator_url')]
        public readonly string $directOperatorUrl,

        #[SerializedName('direct_frontend_url')]
        public readonly string $directFrontendUrl,

        #[SerializedName('upload')]
        public readonly Upload $upload,

        #[SerializedName('ticket')]
        public readonly Ticket $ticket,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
