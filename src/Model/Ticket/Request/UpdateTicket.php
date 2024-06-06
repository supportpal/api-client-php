<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use Illuminate\Support\Str;
use SupportPal\ApiClient\Model\Model;

use function array_unique;
use function trim;

class UpdateTicket extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'brand'                        => 'int',
        'user'                         => 'int',
        'department'                   => 'int',
        'department_email'             => 'int',
        'status'                       => 'int',
        'priority'                     => 'int',
        'subject'                      => 'string',
        'tag'                          => 'array',
        'assignedto'                   => 'array',
        'watching'                     => 'array',
        'link'                         => 'array',
        'unlink'                       => 'array',
        'sla_plan'                     => 'int',
        'reply_due_time'               => 'int',
        'resolve_due_time'             => 'int',
        'customfield'                  => 'array',
        'overwrite_customfield_values' => 'bool',
        'cc'                           => 'array',
        'locked'                       => 'bool',
    ];

    public function setTag(int $tagId): self
    {
        $tags = $this->getAttribute('tag') ?? [];
        $tags[] = $tagId;

        $this->setAttribute('tag', array_unique($tags));

        return $this;
    }

    public function setAssignedOperator(int $operatorId): self
    {
        $assigned = $this->getAttribute('assignedto') ?? [];
        $assigned[] = $operatorId;

        $this->setAttribute('assignedto', array_unique($assigned));

        return $this;
    }

    public function setWatchingOperator(int $operatorId): self
    {
        $watching = $this->getAttribute('watching') ?? [];
        $watching[] = $operatorId;

        $this->setAttribute('watching', array_unique($watching));

        return $this;
    }

    public function linkTicket(int $ticketId): self
    {
        $linked = $this->getAttribute('link') ?? [];
        $linked[] = $ticketId;

        $this->setAttribute('link', array_unique($linked));

        return $this;
    }

    public function unlinkTicket(int $ticketId): self
    {
        $unlinked = $this->getAttribute('unlink') ?? [];
        $unlinked[] = $ticketId;

        $this->setAttribute('unlink', array_unique($unlinked));

        return $this;
    }

    public function setCustomFieldValue(int $fieldId, mixed $value): self
    {
        $customFields = $this->getAttribute('customfield') ?? [];
        $customFields[$fieldId] = $value;

        $this->setAttribute('customfield', $customFields);

        return $this;
    }

    public function setCc(string $email): self
    {
        $cc = $this->getAttribute('cc') ?? [];
        $cc[] = Str::lower(trim($email));

        $this->setAttribute('cc', array_unique($cc));

        return $this;
    }
}
