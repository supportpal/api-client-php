<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\User\User;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Message extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'ticket_id',
        'user_id',
        'text',
    ];

    #[SerializedName('user_id')]
    private int|null $userId;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('created_at')]
    private int|null $createdAt;

    #[SerializedName('purified_text')]
    private string|null $purifiedText;

    #[SerializedName('social_id')]
    private string|null $socialId;

    #[SerializedName('ticket_id')]
    private int $ticketId;

    #[SerializedName('channel_id')]
    private int|null $channelId;

    #[SerializedName('user_ip_address')]
    private string|null $userIpAddress;

    #[SerializedName('by')]
    private int|null $by;

    #[SerializedName('excerpt')]
    private string|null $excerpt;

    #[SerializedName('type')]
    private int|null $type;

    #[SerializedName('extra')]
    private Extra|null $extra;

    #[SerializedName('user_name')]
    private string|null $userName;

    #[SerializedName('updated_at')]
    private int|null $updatedAt;

    #[SerializedName('is_draft')]
    private bool|null $isDraft;

    #[SerializedName('text')]
    private string $text;

    /** @var Attachment[]|null */
    #[SerializedName('attachments')]
    private array|null $attachments;

    private ?User $user;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

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

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPurifiedText(): ?string
    {
        return $this->purifiedText;
    }

    public function setPurifiedText(?string $purifiedText): self
    {
        $this->purifiedText = $purifiedText;

        return $this;
    }

    public function getSocialId(): ?string
    {
        return $this->socialId;
    }

    public function setSocialId(?string $socialId): self
    {
        $this->socialId = $socialId;

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

    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    public function setChannelId(?int $channelId): self
    {
        $this->channelId = $channelId;

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

    public function getBy(): ?int
    {
        return $this->by;
    }

    public function setBy(?int $by): self
    {
        $this->by = $by;

        return $this;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(?string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getExtra(): ?Extra
    {
        return $this->extra;
    }

    public function setExtra(?Extra $extra): self
    {
        $this->extra = $extra;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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
     * @return Attachment[]|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param Attachment[]|null $attachments
     */
    public function setAttachments(?array $attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
