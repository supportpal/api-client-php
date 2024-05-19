<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Upload;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Attachment extends BaseModel
{
    #[SerializedName('original_name')]
    private string $originalName;

    #[SerializedName('upload_hash')]
    private string $uploadHash;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('ticket_id')]
    private int $ticketId;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    #[SerializedName('message_id')]
    private int $messageId;

    #[SerializedName('operator_url')]
    private string $operatorUrl;

    #[SerializedName('frontend_url')]
    private string $frontendUrl;

    #[SerializedName('direct_operator_url')]
    private string $directOperatorUrl;

    #[SerializedName('direct_frontend_url')]
    private string $directFrontendUrl;

    #[SerializedName('upload')]
    private Upload $upload;

    #[SerializedName('ticket')]
    private Ticket $ticket;

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getUploadHash(): string
    {
        return $this->uploadHash;
    }

    public function setUploadHash(string $uploadHash): self
    {
        $this->uploadHash = $uploadHash;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    public function setTicketId(int $ticketId): self
    {
        $this->ticketId = $ticketId;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function setMessageId(int $messageId): self
    {
        $this->messageId = $messageId;

        return $this;
    }

    public function getOperatorUrl(): string
    {
        return $this->operatorUrl;
    }

    public function setOperatorUrl(string $operatorUrl): self
    {
        $this->operatorUrl = $operatorUrl;

        return $this;
    }

    public function getFrontendUrl(): string
    {
        return $this->frontendUrl;
    }

    public function setFrontendUrl(string $frontendUrl): self
    {
        $this->frontendUrl = $frontendUrl;

        return $this;
    }

    public function getDirectOperatorUrl(): string
    {
        return $this->directOperatorUrl;
    }

    public function setDirectOperatorUrl(string $directOperatorUrl): self
    {
        $this->directOperatorUrl = $directOperatorUrl;

        return $this;
    }

    public function getDirectFrontendUrl(): string
    {
        return $this->directFrontendUrl;
    }

    public function setDirectFrontendUrl(string $directFrontendUrl): self
    {
        $this->directFrontendUrl = $directFrontendUrl;

        return $this;
    }

    public function getUpload(): Upload
    {
        return $this->upload;
    }

    public function setUpload(Upload $upload): self
    {
        $this->upload = $upload;

        return $this;
    }

    public function getTicket(): Ticket
    {
        return $this->ticket;
    }

    public function setTicket(Ticket $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }
}
