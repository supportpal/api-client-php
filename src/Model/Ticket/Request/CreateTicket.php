<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use Illuminate\Support\Str;
use SupportPal\ApiClient\Model\Model;

use function array_unique;
use function trim;

class CreateTicket extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'user'                 => 'int',
        'on_behalf_of'         => 'int',
        'user_firstname'       => 'string',
        'user_lastname'        => 'string',
        'user_email'           => 'string',
        'user_organisation'    => 'string',
        'user_ip_address'      => 'string',
        'department'           => 'int',
        'brand'                => 'int',
        'status'               => 'int',
        'priority'             => 'int',
        'internal'             => 'bool',
        'subject'              => 'string',
        'text'                 => 'string',
        'tag'                  => 'array',
        'assignedto'           => 'array',
        'watching'             => 'array',
        'customfield'          => 'array',
        'cc'                   => 'array',
        'send_user_email'      => 'int',
        'send_operators_email' => 'int',
        'attachment'           => 'array',
        'created_at'           => 'int',
    ];

    public function addTag(int $tagId): self
    {
        $tags = $this->getAttribute('tag') ?? [];
        $tags[] = $tagId;

        $this->setAttribute('tag', array_unique($tags));

        return $this;
    }

    public function assignOperator(int $operatorId): self
    {
        $assigned = $this->getAttribute('assignedto') ?? [];
        $assigned[] = $operatorId;

        $this->setAttribute('assignedto', array_unique($assigned));

        return $this;
    }

    public function addWatchingOperator(int $operatorId): self
    {
        $watching = $this->getAttribute('watching') ?? [];
        $watching[] = $operatorId;

        $this->setAttribute('watching', array_unique($watching));

        return $this;
    }

    public function setCustomFieldValue(int $fieldId, mixed $value): self
    {
        $customFields = $this->getAttribute('customfield') ?? [];
        $customFields[$fieldId] = $value;

        $this->setAttribute('customfield', $customFields);

        return $this;
    }

    public function addCc(string $email): self
    {
        $cc = $this->getAttribute('cc') ?? [];
        $cc[] = Str::lower(trim($email));

        $this->setAttribute('cc', array_unique($cc));

        return $this;
    }

    public function addAttachment(string $filename, string $contents): self
    {
        $attachments = $this->getAttribute('attachment') ?? [];
        $attachments[] = ['filename' => $filename, 'contents' => $contents];

        $this->setAttribute('attachment', $attachments);

        return $this;
    }
}
