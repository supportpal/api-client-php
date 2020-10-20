<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Message extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'ticket_id',
        'user_id',
        'text',
    ];

    /**
     * @var int|null
     * @SerializedName("user_id")
     */
    private $userId;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var string
     * @SerializedName("purified_text")
     */
    private $purifiedText;

    /**
     * @var string|null
     * @SerializedName("social_id")
     */
    private $socialId;

    /**
     * @var int
     * @SerializedName("ticket_id")
     */
    private $ticketId;

    /**
     * @var int
     * @SerializedName("channel_id")
     */
    private $channelId;

    /**
     * @var string|null
     * @SerializedName("user_ip_address")
     */
    private $userIpAddress;

    /**
     * @var int
     * @SerializedName("by")
     */
    private $by;

    /**
     * @var string
     * @SerializedName("excerpt")
     */
    private $excerpt;

    /**
     * @var int
     * @SerializedName("type")
     */
    private $type;

    /**
     * @var Extra|null
     * @SerializedName("extra")
     */
    private $extra;

    /**
     * @var string
     * @SerializedName("user_name")
     */
    private $userName;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var int
     * @SerializedName("is_draft")
     */
    private $isDraft;

    /**
     * @var string
     * @SerializedName("text")
     */
    private $text;

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     * @return self
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

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
     * @return string
     */
    public function getPurifiedText(): string
    {
        return $this->purifiedText;
    }

    /**
     * @param string $purifiedText
     * @return self
     */
    public function setPurifiedText(string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSocialId(): ?string
    {
        return $this->socialId;
    }

    /**
     * @param string|null $socialId
     * @return self
     */
    public function setSocialId(?string $socialId): self
    {
        $this->socialId = $socialId;

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
    public function getChannelId(): int
    {
        return $this->channelId;
    }

    /**
     * @param int $channelId
     * @return self
     */
    public function setChannelId(int $channelId): self
    {
        $this->channelId = $channelId;

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
     * @return int
     */
    public function getBy(): int
    {
        return $this->by;
    }

    /**
     * @param int $by
     * @return self
     */
    public function setBy(int $by): self
    {
        $this->by = $by;

        return $this;
    }

    /**
     * @return string
     */
    public function getExcerpt(): string
    {
        return $this->excerpt;
    }

    /**
     * @param string $excerpt
     * @return self
     */
    public function setExcerpt(string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return self
     */
    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Extra|null
     */
    public function getExtra(): ?Extra
    {
        return $this->extra;
    }

    /**
     * @param Extra|null $extra
     * @return self
     */
    public function setExtra(?Extra $extra): self
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return self
     */
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

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
    public function getIsDraft(): int
    {
        return $this->isDraft;
    }

    /**
     * @param int $isDraft
     * @return self
     */
    public function setIsDraft(int $isDraft): self
    {
        $this->isDraft = $isDraft;

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
}
