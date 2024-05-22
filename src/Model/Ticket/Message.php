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
    protected int|null $userId = null;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('created_at')]
    protected int|null $createdAt;

    #[SerializedName('purified_text')]
    protected string|null $purifiedText;

    #[SerializedName('social_id')]
    protected string|null $socialId;

    #[SerializedName('ticket_id')]
    protected int $ticketId;

    #[SerializedName('channel_id')]
    protected int|null $channelId = null;

    #[SerializedName('user_ip_address')]
    protected string|null $userIpAddress = null;

    #[SerializedName('by')]
    protected int|null $by = null;

    #[SerializedName('excerpt')]
    protected string|null $excerpt = null;

    #[SerializedName('type')]
    protected int|null $type = null;

    #[SerializedName('extra')]
    protected Extra|null $extra = null;

    #[SerializedName('user_name')]
    protected string|null $userName = null;

    #[SerializedName('updated_at')]
    protected int|null $updatedAt = null;

    #[SerializedName('is_draft')]
    protected bool|null $isDraft = null;

    #[SerializedName('text')]
    protected string $text;

    /** @var Attachment[]|null */
    #[SerializedName('attachments')]
    protected array|null $attachments = null;

    protected ?User $user = null;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function getPurifiedText(): ?string
    {
        return $this->purifiedText;
    }

    public function getSocialId(): ?string
    {
        return $this->socialId;
    }

    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    public function getUserIpAddress(): ?string
    {
        return $this->userIpAddress;
    }

    public function getBy(): ?int
    {
        return $this->by;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function getExtra(): ?Extra
    {
        return $this->extra;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function getIsDraft(): ?bool
    {
        return $this->isDraft;
    }

    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return Attachment[]|null
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}
