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
    protected int $ticketId;

    #[SerializedName('user_id')]
    protected int $userId;

    #[SerializedName('user_ip_address')]
    protected string|null $userIpAddress;

    #[SerializedName('message_type')]
    protected int|null $messageType;

    #[SerializedName('text')]
    protected string $text;

    /** @var string[]|null */
    #[SerializedName('cc')]
    protected array|null $cc;

    #[SerializedName('is_draft')]
    protected bool|null $isDraft;

    #[SerializedName('send_user_email')]
    protected bool|null $sendUserEmail;

    #[SerializedName('send_operators_email')]
    protected bool|null $sendOperatorsEmail;

    /** @var string[]|null */
    #[SerializedName('attachment')]
    protected array|null $attachment;

    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getUserIpAddress(): ?string
    {
        return $this->userIpAddress;
    }

    public function getMessageType(): ?int
    {
        return $this->messageType;
    }

    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string[]|null
     */
    public function getCc(): ?array
    {
        return $this->cc;
    }

    public function getIsDraft(): ?bool
    {
        return $this->isDraft;
    }

    public function getSendUserEmail(): ?bool
    {
        return $this->sendUserEmail;
    }

    public function getSendOperatorsEmail(): ?bool
    {
        return $this->sendOperatorsEmail;
    }

    /**
     * @return string[]|null
     */
    public function getAttachment(): ?array
    {
        return $this->attachment;
    }
}
