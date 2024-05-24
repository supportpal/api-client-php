<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;

class CreateMessage extends Model
{
    public const REQUIRED_FIELDS = [
        'ticket_id',
        'user_id',
        'text',
    ];

    protected int $ticketId;

    protected int $userId;

    protected string|null $userIpAddress;

    protected int|null $messageType;

    protected string $text;

    /** @var string[]|null */
    protected array|null $cc;

    protected bool|null $isDraft;

    protected bool|null $sendUserEmail;

    protected bool|null $sendOperatorsEmail;

    /** @var string[]|null */
    protected array|null $attachment;
}
