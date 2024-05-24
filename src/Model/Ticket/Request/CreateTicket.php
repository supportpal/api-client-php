<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;

class CreateTicket extends Model
{
    public const REQUIRED_FIELDS = [
        'department',
        'status',
        'priority',
        'subject',
        'text',
    ];

    protected int|null $user;

    protected int|null $onBehalfOf;

    protected string|null $userFirstname;

    protected string|null $userLastname;

    protected string|null $userEmail;

    protected string|null $userOrganisation;

    protected string|null $userIpAddress;

    protected int $department;

    protected int|null $brand;

    protected int $status;

    protected int $priority;

    protected bool|null $internal;

    protected string $subject;

    protected string $text;

    /** @var int[]|null */
    protected array|null $tag;

    /** @var int[]|null */
    protected array|null $assignedto;

    /** @var int[]|null */
    protected array|null $watching;

    /** @var int[]|null */
    protected array|null $customfield;

    /** @var string[]|null */
    protected array|null $cc;

    protected int|null $sendUserEmail;

    protected int|null $sendOperatorsEmail;

    /** @var string[]|null */
    protected array|null $attachment;

    protected int|null $createdAt;
}
