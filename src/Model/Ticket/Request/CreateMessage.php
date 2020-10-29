<?php


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
     * @var string
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
     * @var array|null
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
     * @var string[]|null
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
     * @return CreateMessage
     */
    public function setTicketId(int $ticketId): CreateMessage
    {
        $this->ticketId = $ticketId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return CreateMessage
     */
    public function setUserId(string $userId): CreateMessage
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
     * @return CreateMessage
     */
    public function setUserIpAddress(?string $userIpAddress): CreateMessage
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
     * @return CreateMessage
     */
    public function setMessageType(?int $messageType): CreateMessage
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
     * @return CreateMessage
     */
    public function setText(string $text): CreateMessage
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }

    /**
     * @param array|null $cc
     * @return CreateMessage
     */
    public function setCc(?array $cc): CreateMessage
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
     * @return CreateMessage
     */
    public function setIsDraft(?bool $isDraft): CreateMessage
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
     * @return CreateMessage
     */
    public function setSendUserEmail(?bool $sendUserEmail): CreateMessage
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
     * @return CreateMessage
     */
    public function setSendOperatorsEmail(?bool $sendOperatorsEmail): CreateMessage
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
     * @return CreateMessage
     */
    public function setAttachment(?array $attachment): CreateMessage
    {
        $this->attachment = $attachment;
        return $this;
    }
}
