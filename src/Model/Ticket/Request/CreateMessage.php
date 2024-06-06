<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use Illuminate\Support\Str;
use SupportPal\ApiClient\Model\Model;

use function array_unique;
use function trim;

class CreateMessage extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'ticket_id'            => 'int',
        'user_id'              => 'int',
        'user_ip_address'      => 'string',
        'message_type'         => 'int',
        'text'                 => 'string',
        'attachment'           => 'array',
        'cc'                   => 'array',
        'is_draft'             => 'bool',
        'send_user_email'      => 'bool',
        'send_operators_email' => 'bool',
        'created_at'           => 'int',
    ];

    public function addAttachment(string $filename, string $contents): self
    {
        $attachments = $this->getAttribute('attachment') ?? [];
        $attachments[] = ['filename' => $filename, 'contents' => $contents];

        $this->setAttribute('attachment', $attachments);

        return $this;
    }

    public function addCc(string $email): self
    {
        $cc = $this->getAttribute('cc') ?? [];
        $cc[] = Str::lower(trim($email));

        $this->setAttribute('cc', array_unique($cc));

        return $this;
    }
}
