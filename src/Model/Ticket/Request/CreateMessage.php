<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class CreateMessage extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'ticket_id',
        'user_id',
        'text',
    ];

    #[SerializedName('ticket_id')]
    private int $ticketId;

    #[SerializedName('user_id')]
    private int $userId;

    #[SerializedName('user_ip_address')]
    private string|null $userIpAddress;

    #[SerializedName('message_type')]
    private int|null $messageType;

    #[SerializedName('text')]
    private string $text;

    /** @var string[]|null */
    #[SerializedName('cc')]
    private array|null $cc;

    #[SerializedName('is_draft')]
    private bool|null $isDraft;

    #[SerializedName('send_user_email')]
    private bool|null $sendUserEmail;

    #[SerializedName('send_operators_email')]
    private bool|null $sendOperatorsEmail;

    /** @var string[]|null */
    #[SerializedName('attachment')]
    private array|null $attachment;

    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    public function setTicketId(int $ticketId): self
    {
        $this->ticketId = $ticketId;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserIpAddress(): ?string
    {
        return $this->userIpAddress;
    }

    public function setUserIpAddress(?string $userIpAddress): self
    {
        $this->userIpAddress = $userIpAddress;

        return $this;
    }

    public function getMessageType(): ?int
    {
        return $this->messageType;
    }

    public function setMessageType(?int $messageType): self
    {
        $this->messageType = $messageType;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }

    /**
     * @param string[]|null $cc
     */
    public function setCc(?array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    public function getIsDraft(): ?bool
    {
        return $this->isDraft;
    }

    public function setIsDraft(?bool $isDraft): self
    {
        $this->isDraft = $isDraft;

        return $this;
    }

    public function getSendUserEmail(): ?bool
    {
        return $this->sendUserEmail;
    }

    public function setSendUserEmail(?bool $sendUserEmail): self
    {
        $this->sendUserEmail = $sendUserEmail;

        return $this;
    }

    public function getSendOperatorsEmail(): ?bool
    {
        return $this->sendOperatorsEmail;
    }

    public function setSendOperatorsEmail(?bool $sendOperatorsEmail): self
    {
        $this->sendOperatorsEmail = $sendOperatorsEmail;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getAttachment(): ?array
    {
        return $this->attachment;
    }

    /**
     * @param string[]|null $attachment
     */
    public function setAttachment(?array $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }
}
