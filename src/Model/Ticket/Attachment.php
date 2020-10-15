<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Upload;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Attachment extends BaseModel
{
    /**
     * @var string
     * @SerializedName("original_name")
     */
    private $originalName;

    /**
     * @var string
     * @SerializedName("upload_hash")
     */
    private $uploadHash;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var int
     * @SerializedName("ticket_id")
     */
    private $ticketId;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int
     * @SerializedName("message_id")
     */
    private $messageId;

    /**
     * @var string
     * @SerializedName("operator_url")
     */
    private $operatorUrl;

    /**
     * @var string
     * @SerializedName("frontend_url")
     */
    private $frontendUrl;

    /**
     * @var string
     * @SerializedName("direct_operator_url")
     */
    private $directOperatorUrl;

    /**
     * @var string
     * @SerializedName("direct_frontend_url")
     */
    private $directFrontendUrl;

    /**
     * @var Upload
     * @SerializedName("upload")
     */
    private $upload;

    /**
     * @var Ticket
     * @SerializedName("ticket")
     */
    private $ticket;

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     * @return self
     */
    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    /**
     * @return string
     */
    public function getUploadHash(): string
    {
        return $this->uploadHash;
    }

    /**
     * @param string $uploadHash
     * @return self
     */
    public function setUploadHash(string $uploadHash): self
    {
        $this->uploadHash = $uploadHash;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    /**
     * @param int $ticketId
     * @return self
     */
    public function setTicketId(int $ticketId): self
    {
        $this->ticketId = $ticketId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return self
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return self
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return self
     */
    public function setMessageId(int $messageId): self
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperatorUrl(): string
    {
        return $this->operatorUrl;
    }

    /**
     * @param string $operatorUrl
     * @return self
     */
    public function setOperatorUrl(string $operatorUrl): self
    {
        $this->operatorUrl = $operatorUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrontendUrl(): string
    {
        return $this->frontendUrl;
    }

    /**
     * @param string $frontendUrl
     * @return self
     */
    public function setFrontendUrl(string $frontendUrl): self
    {
        $this->frontendUrl = $frontendUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectOperatorUrl(): string
    {
        return $this->directOperatorUrl;
    }

    /**
     * @param string $directOperatorUrl
     * @return self
     */
    public function setDirectOperatorUrl(string $directOperatorUrl): self
    {
        $this->directOperatorUrl = $directOperatorUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectFrontendUrl(): string
    {
        return $this->directFrontendUrl;
    }

    /**
     * @param string $directFrontendUrl
     * @return self
     */
    public function setDirectFrontendUrl(string $directFrontendUrl): self
    {
        $this->directFrontendUrl = $directFrontendUrl;

        return $this;
    }

    /**
     * @return Upload
     */
    public function getUpload(): Upload
    {
        return $this->upload;
    }

    /**
     * @param Upload $upload
     * @return self
     */
    public function setUpload(Upload $upload): self
    {
        $this->upload = $upload;

        return $this;
    }

    /**
     * @return Ticket
     */
    public function getTicket(): Ticket
    {
        return $this->ticket;
    }

    /**
     * @param Ticket $ticket
     * @return self
     */
    public function setTicket(Ticket $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }
}
