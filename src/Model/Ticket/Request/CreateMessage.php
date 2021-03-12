<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateMessage extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'ticket_id',
        'user_id',
        'text',
    ];

    /**
     * @var int
     * @SerializedName("ticket_id")
     */
    private $ticketId;

    /**
     * @var int
     * @SerializedName("user_id")
     */
    private $userId;

    /**
     * @var string|null
     * @SerializedName("user_ip_address")
     */
    private $userIpAddress;

    /**
     * @var int|null
     * @SerializedName("message_type")
     */
    private $messageType;

    /**
     * @var string
     * @SerializedName("text")
     */
    private $text;

    /**
     * @var string[]|null
     * @SerializedName("cc")
     */
    private $cc;

    /**
     * @var bool|null
     * @SerializedName("is_draft")
     */
    private $isDraft;

    /**
     * @var bool|null
     * @SerializedName("send_user_email")
     */
    private $sendUserEmail;

    /**
     * @var bool|null
     * @SerializedName("send_operators_email")
     */
    private $sendOperatorsEmail;

    /**
     * @var array<string[]>|null
     * @SerializedName("attachment")
     */
    private $attachment;

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return self
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserIpAddress(): ?string
    {
        return $this->userIpAddress;
    }

    /**
     * @param string|null $userIpAddress
     * @return self
     */
    public function setUserIpAddress(?string $userIpAddress): self
    {
        $this->userIpAddress = $userIpAddress;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageType(): ?int
    {
        return $this->messageType;
    }

    /**
     * @param int|null $messageType
     * @return self
     */
    public function setMessageType(?int $messageType): self
    {
        $this->messageType = $messageType;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
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
     * @return self
     */
    public function setCc(?array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsDraft(): ?bool
    {
        return $this->isDraft;
    }

    /**
     * @param bool|null $isDraft
     * @return self
     */
    public function setIsDraft(?bool $isDraft): self
    {
        $this->isDraft = $isDraft;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSendUserEmail(): ?bool
    {
        return $this->sendUserEmail;
    }

    /**
     * @param bool|null $sendUserEmail
     * @return self
     */
    public function setSendUserEmail(?bool $sendUserEmail): self
    {
        $this->sendUserEmail = $sendUserEmail;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSendOperatorsEmail(): ?bool
    {
        return $this->sendOperatorsEmail;
    }

    /**
     * @param bool|null $sendOperatorsEmail
     * @return self
     */
    public function setSendOperatorsEmail(?bool $sendOperatorsEmail): self
    {
        $this->sendOperatorsEmail = $sendOperatorsEmail;

        return $this;
    }

    /**
     * @return array<string[]>|null
     */
    public function getAttachment(): ?array
    {
        return $this->attachment;
    }

    /**
     * This method expects an array of attachments in the following format.
     * ['filename' => 'test', 'contents' => 'some-base-64-string'].
     * If the array is supplied using an incorrect format the attachment will be ignored.
     * This method overwrites any attachments you previously set.
     * @param array<string[]>|null $attachments
     * @return self
     */
    public function setAttachment(?array $attachments): self
    {
        $this->attachment = $attachments;

        return $this;
    }

    public function addAttachment(string $fileName, string $contents): self
    {
        $this->attachment[] = ['filename' => $fileName, 'contents' => $contents];

        return $this;
    }
}
