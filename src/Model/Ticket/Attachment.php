<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Upload;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Attachment extends BaseModel
{
    #[SerializedName('original_name')]
    protected string $originalName;

    #[SerializedName('upload_hash')]
    protected string $uploadHash;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('ticket_id')]
    protected int $ticketId;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    #[SerializedName('message_id')]
    protected int $messageId;

    #[SerializedName('operator_url')]
    protected string $operatorUrl;

    #[SerializedName('frontend_url')]
    protected string $frontendUrl;

    #[SerializedName('direct_operator_url')]
    protected string $directOperatorUrl;

    #[SerializedName('direct_frontend_url')]
    protected string $directFrontendUrl;

    #[SerializedName('upload')]
    protected Upload $upload;

    #[SerializedName('ticket')]
    protected Ticket $ticket;

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getUploadHash(): string
    {
        return $this->uploadHash;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function getOperatorUrl(): string
    {
        return $this->operatorUrl;
    }

    public function getFrontendUrl(): string
    {
        return $this->frontendUrl;
    }

    public function getDirectOperatorUrl(): string
    {
        return $this->directOperatorUrl;
    }

    public function getDirectFrontendUrl(): string
    {
        return $this->directFrontendUrl;
    }

    public function getUpload(): Upload
    {
        return $this->upload;
    }

    public function getTicket(): Ticket
    {
        return $this->ticket;
    }
}
