<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Department extends BaseModel
{
    public function __construct(
        #[SerializedName('disable_user_email_replies')]
        public readonly bool $disableUserEmailReplies,
        #[SerializedName('public')]
        public readonly bool $public,
        #[SerializedName('ticket_number_format')]
        public readonly ?string $ticketNumberFormat,
        #[SerializedName('name')]
        public readonly string $name,
        #[SerializedName('notify_frontend_ticket')]
        public readonly bool $notifyFrontendTicket,
        #[SerializedName('order')]
        public readonly ?int $order,
        #[SerializedName('description')]
        public readonly ?string $description,
        #[SerializedName('notify_email_ticket')]
        public readonly bool $notifyEmailTicket,
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('from_name')]
        public readonly ?string $fromName,
        #[SerializedName('created_at')]
        public readonly int $createdAt,
        #[SerializedName('registered_only')]
        public readonly int $registeredOnly,
        #[SerializedName('parent_id')]
        public readonly ?int $parentId,
        #[SerializedName('updated_at')]
        public readonly int $updatedAt,
        #[SerializedName('notify_operators')]
        public readonly bool $notifyOperators,
        /** @var string[] */
        #[SerializedName('default_assignedto')]
        public readonly array $defaultAssignedto,
        #[SerializedName('email_templates')]
        public readonly ?EmailTemplates $emailTemplates,
        /** @var Email[]|null */
        #[SerializedName('emails')]
        public readonly ?array $emails,
        /** @var array<mixed>|null */
        #[SerializedName('groups')]
        public readonly ?array $groups,
        /** @var Operator[]|null */
        #[SerializedName('operators')]
        public readonly ?array $operators,
        /** @var DepartmentTranslation[]|null */
        #[SerializedName('translations')]
        public readonly ?array $translations,
        public readonly ?Department $parent = null,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
